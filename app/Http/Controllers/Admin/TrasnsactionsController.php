<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Models\Transactions;
use App\Models\User;
use App\Models\Vouchers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel; // ✅ Panggil Excel dari Maatwebsite
use App\Exports\TransactionsExport;  //

class TrasnsactionsController extends Controller
{
    public function transactions(Request $request)
{
    $query = Transactions::with(['user', 'userVoucher.voucher']);
   
    // Filter by payment status
    if ($request->filled('payment_status')) {
        $query->where('payment_status', $request->payment_status);
    }

    // Filter by date range
    if ($request->filled('date_from')) {
        $query->whereDate('created_at', '>=', $request->date_from);
    }

    if ($request->filled('date_to')) {
        $query->whereDate('created_at', '<=', $request->date_to);
    }

    $transactions = $query->latest()->paginate(10);

    return view('admin.transactions.transactions', compact('transactions'));
}
    

    /**
     * Display the specified transaction.
     */
    public function show(Transactions $transaction)
{
    // Load relationship yang sesuai
    $query = Transactions::with(['user', 'userVoucher.voucher']);
    // atau relasi yang sesuai
    
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
    // Calculate subtotal
    $subtotal = $transaction->transactionDetails->sum('subtotal');
    $transactions = $query->latest()->paginate(10);
   
    return view('admin.transactions.bill', compact(
        'transaction',
        'subtotal',
        'discountAmount',
        'totalAfterDiscount',
        'transactions',
        'totalDiscountAmount',
        'voucherDiscountAmount',
        'xpDiscountAmount',
        'level',
        'voucherType',
        'voucherName',
        'xpDiscount',
        'totalItems'
        ));
}

    /**
     * Update the specified transaction status.
     */
    public function updateStatus(Request $request, Transactions $transaction)
{
    $request->validate([
        'status' => 'required|in:pending,completed,cancelled',
    ]);

    // Update status transaksi
    $transaction->payment_status = $request->status;
    $transaction->save();

    // Jika transaksi selesai, tambahkan XP dan Points ke user
    if ($request->status === 'completed') {
        $user = $transaction->user; // Pastikan ada relasi ke model User

        if ($user) {
            // Tambahkan XP user
            $xpEarned = $transaction->xp_earned;
            app(AdminUserController::class)->updateUserExp($user->id, $xpEarned);

            // Tambahkan Points ke user (tidak ada batasan)
            $pointsEarned = $transaction->points_earned;
            $user->points += $pointsEarned;
            $user->save();

            // Terapkan diskon ke total harga
            $transaction->total_amount = $this->applyDiscount($user->id, $transaction->total_amount);
            $transaction->save();
        }
    }

    return redirect()->route('admin.transactions.show', $transaction)
        ->with('success', 'Status transaksi berhasil diperbarui.');
}



    /**
     * Print the transaction receipt.
     */
  
     public function updateTotal(Request $request, Transactions $transaction)
     {
         $request->validate([
             'total_amount' => 'required|numeric|min:0',
         ]);
     
         // Hapus titik (.) dari format angka dan ubah ke float
         $totalAmount = str_replace('.', '', $request->total_amount);
         $totalAmount = floatval(str_replace(',', '.', $totalAmount)); // Jika ada koma sebagai desimal
     
         // Update kolom total_amount di database
         $transaction->update(['total_amount' => $totalAmount]);
     
         return redirect()->back()->with('success', 'Total transaksi berhasil diperbarui.');
     }
     
     public function applyDiscount($userId, $totalPrice)
{
    $user = User::find($userId);

    $discount = 0;

    if ($user->level == 'silver') {
        $discount = 0.03; // 3%
    } elseif ($user->level == 'gold') {
        $discount = 0.05; // 5%
    } elseif ($user->level == 'platinum') {
        $discount = 0.08; // 8%
    }

    $finalPrice = $totalPrice - ($totalPrice * $discount);

    return $finalPrice;
}

public function exportExcel(Request $request)
{
    try {
        $selectedIds = $request->input('selected_transactions', []);
        
        // Jika tidak ada transaksi yang dipilih
        if (empty($selectedIds)) {
            return redirect()->back()->with('error', 'Silakan pilih minimal satu transaksi untuk di-export');
        }
        
        // Ambil transaksi yang dipilih
        $selectedTransactions = transactions::whereIn('id', $selectedIds)
                                ->with(['user', 'userVoucher.voucher'])
                                ->get();
        
        if ($selectedTransactions->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data transaksi yang dapat di-export');
        }
        
        $fileName = 'transaksi_' . date('Y-m-d_H-i-s') . '.xlsx';
        
        return Excel::download(new TransactionsExport($selectedTransactions), $fileName);
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

}
