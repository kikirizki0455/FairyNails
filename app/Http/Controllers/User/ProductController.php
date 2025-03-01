<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transactions;
use App\Models\UserVouchers;
use App\Models\Vouchers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function products()
    {
        $products = Product::latest()->paginate(10);
        $categories = Product::select('category')->distinct()->pluck('category')->toArray(); // Perbaikan distinct
        
        return view('user.product.product', compact('products', 'categories'));
    }

    // Menangani filter produk (AJAX)
    public function filter(Request $request)
    {
        // Ambil parameter filter dari request
        $query = $request->input('query');
        $category = $request->input('category');
        $sort = $request->input('sort');

        // Query dasar
        $products = Product::query();

        // Filter berdasarkan pencarian (nama produk)
        if ($query) {
            $products->where('name', 'like', '%' . $query . '%');
        }

        // Filter berdasarkan kategori
        if ($category) {
            $products->where('category', $category);
        }

        // Urutkan produk
        if ($sort === 'price_low') {
            $products->orderBy('price', 'asc');
        } elseif ($sort === 'price_high') {
            $products->orderBy('price', 'desc');
        } else {
            $products->orderBy('created_at', 'desc'); // Default: Terbaru
        }

        // Ambil data produk yang sudah difilter
        $filteredProducts = $products->paginate(12);

        // Kembalikan view partial yang berisi daftar produk
        return view('user.product.partials.product_list', compact('filteredProducts'))->render();
    }

    // Menambahkan produk ke keranjang
    public function addToCart(Request $request)
{
    // Validasi input
    $request->validate([
        'product_id' => 'required|exists:products,id',
    ]);

    // Ambil ID produk dan jumlah yang diinginkan
    $productId = $request->input('product_id');
    $quantity = $request->input('quantity', 1);

    // Ambil informasi produk dari database
    $product = Product::find($productId);
    if (!$product) {
        return redirect()->back()->with('error', 'Produk tidak ditemukan.');
    }

    // Cek apakah ada keranjang di sesi
    $cart = session()->get('cart', []);

    // Jika produk sudah ada di keranjang, tambahkan jumlahnya
    if (isset($cart[$productId])) {
        $cart[$productId]['quantity'] += $quantity;
    } else {
        // Tambahkan produk ke keranjang
        $cart[$productId] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $quantity,
            'image' => $product->image
        ];
    }

    // Simpan kembali ke sesi
    session()->put('cart', $cart);

    // Debugging: Tampilkan isi keranjang setelah ditambahkan


    return redirect()->route('user.cart')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
}
    public function calculateTotal($cart)
{
    $total = 0;

    // Loop melalui produk di keranjang dan hitung total harga
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    return $total;
}

    public function updateCart(Request $request)
{
    $cart = session()->get('cart', []);
    $cartId = $request->input('cart_id');
    $increase = $request->has('increase');
    $decrease = $request->has('decrease');
    
    if (isset($cart[$cartId])) {
        if ($increase) {
            $cart[$cartId]['quantity']++;
        } elseif ($decrease) {
            $cart[$cartId]['quantity']--;
            
            // Hapus item jika jumlahnya kurang dari 1
            if ($cart[$cartId]['quantity'] < 1) {
                unset($cart[$cartId]);
            }
        }
    }
    
    session()->put('cart', $cart);
    return redirect()->route('user.cart')->with('success', 'Keranjang diperbarui!');
}
public function showCart()
{
    $cartItems = session()->get('cart', []); // Ambil data keranjang dari sesi
    $subtotal = 0;

    // Hitung subtotal
    foreach ($cartItems as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }

    // Ambil voucher dari sesi jika ada
    $selectedVoucherId = session()->get('selectedVoucherId', null);
    $selectedVoucher = null;
    $discount = 0;

    if ($selectedVoucherId) {
        $userVoucher = UserVouchers::where('voucher_id', $selectedVoucherId)
            ->where('user_id', Auth::id())
            ->where('is_used', 0)
            ->first();
    
            
            if ($selectedVoucher) {
            // Pastikan transaksi memenuhi minimum transaksi
            if ($subtotal >= $selectedVoucher->minimum_transaction) {
                if ($selectedVoucher->type == 'percentage_discount') {
                    $discount = ($selectedVoucher->value / 100) * $subtotal;
                } else { // Jika bukan persentase, berarti free_service (anggap sebagai potongan langsung)
                    $discount = $selectedVoucher->value;
                }
            }
        }
    }
    
    // Hitung total
    $total = max(0, $subtotal - $discount); // Pastikan total tidak negatif

    // Ambil voucher yang tersedia untuk user yang sedang login
    $userVouchers = [];
    if (Auth::check()) {
        $userVouchers = UserVouchers::where('user_id', Auth::id()) // Ambil berdasarkan user yang login
            ->where('is_used', 0) // Hanya voucher yang belum digunakan
            ->whereDate('expire_date', '>=', Carbon::today()) // Hanya voucher yang belum kadaluarsa
            ->with('voucher') // Ambil relasi dengan tabel voucher
            ->get();
        }
        
        session()->put('cart_items', $cartItems);
        session()->put('cart_total', $total);
        session()->put('cart_discount', $discount);
        session()->put('cart_subtotal', $subtotal);
        session()->put('cart_voucher', $selectedVoucher);
        
        
    // Kirim data ke view
    return view('user.product.keranjang', compact(
        'cartItems',
        'subtotal',
        'total',
        'selectedVoucher',
        'selectedVoucherId',
        'discount',
        'userVouchers',
    ));
}
public function removeFromCart(Request $request)
{
    $cart = session()->get('cart', []);

    // Ambil ID produk yang akan dihapus
    $cartId = $request->input('cart_id');

    // Periksa apakah item ada di keranjang
    if (isset($cart[$cartId])) {
        unset($cart[$cartId]); // Hapus item dari array
        session()->put('cart', $cart); // Perbarui session
    }

    return redirect()->route('user.cart')->with('success', 'Item berhasil dihapus dari keranjang.');
}
public function applyVoucher(Request $request)
{
    // Pastikan user login
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Silakan login untuk menggunakan voucher.');
    }

    // Ambil voucher_id dari request
    $voucherId = $request->input('voucher_id');

    // Ambil data voucher yang dimiliki user
    $userVoucher = UserVouchers::where('user_id', Auth::id()) // Hanya voucher milik user
        ->where('voucher_id', $voucherId) // Sesuai dengan yang dipilih
        ->where('is_used', 0) // Belum digunakan
        ->whereDate('expire_date', '>=', Carbon::today()) // Belum kadaluarsa
        ->with('voucher') // Ambil informasi dari tabel voucher
        ->first();

    // Jika voucher tidak ditemukan atau tidak valid
    if (!$userVoucher) {
        return redirect()->back()->with('error', 'Voucher tidak valid atau sudah kadaluarsa.');
    }

    // Ambil subtotal dari sesi keranjang
    $cartItems = session()->get('cart', []);
    $subtotal = 0;

    foreach ($cartItems as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }

    // Ambil informasi voucher
    $voucher = $userVoucher->voucher;

    // Pastikan transaksi memenuhi minimum transaksi
    if ($subtotal < $voucher->minimum_transaction) {
        return redirect()->back()->with('error', 'Total transaksi tidak memenuhi syarat minimum voucher.');
    }

    // Tentukan deskripsi berdasarkan tipe voucher
    $description = '';
    $discount = 0; // Default 0 untuk semua tipe voucher

    if ($voucher->type == 'percentage_discount') {
        // Hitung diskon berdasarkan persentase
        $discount = ($voucher->value / 100) * $subtotal;
        $description = "Mendapatkan potongan harga sebesar Rp " . number_format($discount, 0, ',', '.');
    } elseif ($voucher->type == 'fixed_discount') {
        // Diskon tetap
        $discount = $voucher->value;
        $description = "Mendapatkan potongan harga sebesar Rp " . number_format($discount, 0, ',', '.');
    } else { 
        // Jika tipe free_service
        $description = "Mendapatkan layanan " . $voucher->name;
    }

    // Simpan voucher yang dipilih dalam sesi dengan key yang konsisten
    session()->put('selectedVoucherId', $voucher->id);
    session()->put('selectedVoucher', [
        'id' => $voucher->id,
        'name' => $voucher->name,
        'type' => $voucher->type,
        'value' => $discount,
        'description' => $description
    ]);

    // Simpan juga nilai diskon ke cart_discount untuk kompatibilitas
    session()->put('cart_discount', $discount);
    session()->put('cart_subtotal', $subtotal);
    session()->put('cart_total', $subtotal - $discount);

    return redirect()->back()->with('success', 'Voucher berhasil diterapkan!');
}


}
