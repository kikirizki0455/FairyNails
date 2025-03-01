<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transactions;
use App\Models\UserVouchers;
use App\Models\Vouchers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
  

    public function transactions(Request $request)
    {
        // Dapatkan user yang sedang login
        $user = Auth::user();
        
        $cartItems = session()->get('cart', []);
        $cartSubtotal = session()->get('subtotal', 0);
        
        // Ambil parameter filter payment_status (jika ada)
        $paymentStatus = $request->get('payment_status');
        
        // Inisialisasi query
        $query = Transactions::with(['user', 'voucher', 'transactionDetails'])
            ->where('user_id', $user->id) // Ambil transaksi berdasarkan user_id
            ->latest();
        
        // Terapkan filter payment_status jika ada
        if ($paymentStatus) {
            $query->where('payment_status', $paymentStatus);
            $activeTab = $paymentStatus; // Set tab aktif sesuai filter
        } else {
            $activeTab = 'semua'; // Set default tab
        }
        
        // Jalankan query dengan pagination
        $transactions = $query->paginate(10);
        
        // Pertahankan parameter filter saat paginasi
        $transactions->appends($request->query());
        
        return view('user.transactions.transactions', compact('transactions', 'activeTab'));
    }
    

    public function checkout(Request $request)
    {
        // Ambil data keranjang dari session
        $cart = session('cart', []);
        
        // Ambil data voucher dari session menggunakan key yang sama dengan yang digunakan di applyVoucher
        $selectedVoucher = session('selectedVoucher'); 
        $selectedVoucherId = session('selectedVoucherId');
        
        // Hitung subtotal
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        
        // Inisialisasi discount dan total
        $cartDiscount = 0;
        
        // Jika ada voucher yang dipilih dan tipe-nya percentage_discount
        if ($selectedVoucher && isset($selectedVoucher['value'])) {
            $cartDiscount = $selectedVoucher['value']; // Nilai diskon dari session
        }
        

        // Hitung total setelah diskon
        $cartTotal = $subtotal - $cartDiscount;
        
        // Pastikan total tidak negatif
        $cartTotal = max(0, $cartTotal);
        // Hitung poin dan exp
        $points = floor($cartTotal / 10000); // 1 point per Rp10.000
        $exp = floor($cartTotal / 10000) * 100; // 100 exp per Rp10.000
        
        // Ambil user_voucher_id dari database jika ada
        $userVoucherId = null;
        if ($selectedVoucherId) {
            // Cari user_voucher_id yang sesuai dengan voucher_id
            $userVoucher = UserVouchers::where('voucher_id', $selectedVoucherId)
                ->where('user_id', Auth::id())
                ->where('is_used', 0)
                ->first();
            
            if ($userVoucher) {
                $userVoucherId = $userVoucher->id;
            }
        }
        
        // Simpan data transaksi ke dalam tabel transactions
        $transaction = new Transactions();
        $transaction->user_id = Auth::id(); // Dapatkan ID pengguna yang sedang login
        $transaction->payment_status = 'pending'; // Status transaksi
        $transaction->total_amount = $cartTotal;
        $transaction->xp_earned = $exp; 
        $transaction->points_earned = $points; 
        $transaction->voucher_id = $userVoucherId; // Gunakan user_voucher_id, bukan voucher_id
        $transaction->discount_amount = $cartDiscount; // Gunakan nilai diskon yang sudah dihitung

        $transaction->save();
        
        // Simpan detail transaksi ke dalam tabel transaction_details
        foreach ($cart as $item) {
            $transaction->transactionDetails()->create([
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $item['price'] * $item['quantity'],
            ]);
        }
        
        // Tandai voucher sebagai used jika digunakan
        if ($userVoucherId) {
            $userVoucher->is_used = 1;
            $userVoucher->save();
        }
        
        // Hapus data keranjang setelah transaksi disimpan
        session()->forget('cart');
        session()->forget('selectedVoucher');
        session()->forget('selectedVoucherId');
        
        // Simpan informasi exp dan points ke session
        session(['exp' => $exp, 'points' => $points]);
        
        // Redirect ke halaman detail transaksi
        return redirect()->route('user.transaction.detail', ['id' => $transaction->id]);
    }
    
    
public function detail($id)
{
    $cartItems = session()->get('cart_items', []);
    $cartSubtotal = session()->get('subtotal', 0);
    $transaction = Transactions::with('transactionDetails')->findOrFail($id); // Ambil data transaksi dan detailnya
    $selectedVoucher = session()->get('selectedVoucher');
    $selectedVoucherId = session()->get('cart_voucher', null);

     // Hitung subtotal dari semua item dalam transaksi
     $subtotal = $transaction->transactionDetails->sum('subtotal');

     
     // Ambil nilai diskon dari voucher (jika ada)
     $voucherDiscount = $transaction->userVoucher?->voucher?->value ?? 0;
     $voucherType = $transaction->userVoucher?->voucher?->type ?? '-';
     $voucherName = $transaction->userVoucher?->voucher?->name ?? '-';
     $voucherDiscountAmount = ($subtotal * $voucherDiscount) / 100;
    
    
     //  diskon sesuai level pengguna
     $userDiscount = $transaction->user->getDiscountLevel();
     $level = $userDiscount['level'];
     
     $xpDiscount = $userDiscount['discount'];
     $xpDiscountAmount = ($subtotal * $xpDiscount) / 100;
     
     //  tambahkan jumlah diskon berdasarkan voucher dan level 
     
     $totalDiscountAmount = $voucherDiscountAmount + $xpDiscountAmount;
     
     // Hitung jumlah diskon (berapa yang dipotong)
     $discountAmount = ($subtotal * $voucherDiscount) / 100;
      // Hitung total setelah diskon
    $totalAfterDiscount = $subtotal - $totalDiscountAmount;
    $totalItems = $transaction->transactionDetails->sum('quantity');
    

    // Ambil exp dan points dari session
    $exp = session()->get('exp', 0); // Default ke 0 jika tidak ada
    $points = session()->get('points', 0); // Default ke 0 jika tidak ada

    return view('user.transactions.detail-transactions', 
    compact(
    'transaction',
    'selectedVoucher',
    'subtotal',
    'voucherDiscount',
    'voucherDiscountAmount',
    'xpDiscountAmount',
    'totalDiscountAmount',  
    'totalAfterDiscount',
    'exp',
    'points',
    'totalItems',
    'level',
    'xpDiscount',
    'voucherType',
    'voucherName'
));
}

public function pay($id)
{
        $transaction = Transactions::with('transactionDetails')->findOrFail($id); // Ambil data transaksi dan detailnya
        $selectedVoucher = session()->get('selectedVoucher');
         // Hitung subtotal dari semua item dalam transaksi
     $subtotal = $transaction->transactionDetails->sum('subtotal');

     
     // Ambil nilai diskon dari voucher (jika ada)
     $voucherDiscount = $transaction->userVoucher?->voucher?->value ?? 0;
     $voucherType = $transaction->userVoucher?->voucher?->type ?? '-';
     $voucherName = $transaction->userVoucher?->voucher?->name ?? '-';
     $voucherDiscountAmount = ($subtotal * $voucherDiscount) / 100;
    
    
     //  diskon sesuai level pengguna
     $userDiscount = $transaction->user->getDiscountLevel();
     $level = $userDiscount['level'];
     
     $xpDiscount = $userDiscount['discount'];
     $xpDiscountAmount = ($subtotal * $xpDiscount) / 100;
     
     //  tambahkan jumlah diskon berdasarkan voucher dan level 
     
     $totalDiscountAmount = $voucherDiscountAmount + $xpDiscountAmount;
     
     // Hitung jumlah diskon (berapa yang dipotong)
     $discountAmount = ($subtotal * $voucherDiscount) / 100;
      // Hitung total setelah diskon
    $totalAfterDiscount = $subtotal - $totalDiscountAmount;
    
    // Ubah status menjadi 'proses'
    $transaction->payment_status = 'process';
    $transaction->save();

        return view('user.transactions.pay',
         compact(
            'transaction',
            'selectedVoucher',
            'totalAfterDiscount'
        ));
    }
  

}