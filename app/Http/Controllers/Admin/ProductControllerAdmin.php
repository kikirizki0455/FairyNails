<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductControllerAdmin extends Controller
{
   

    public function products(){
            $products = Product::latest()->paginate(10); // ← Ini yang kurang
            return view('admin.product.product', compact('products'));
        }

    public function create(){
        
        return view('admin.product.addProduct');
    }

    public function store(Request $request){
    // Validasi input
    $request->validate([
        'category' => 'required|in:Nail Art,Nail Extension,Press On Nails', // Sesuai dropdown
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
    ]);

    // Simpan gambar jika ada
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
    }

    // Simpan produk ke database
    Product::create([
        'category' => $request->category,
        'name' => $request->name,
        'description' => $request->description, // Tambahkan ini
        'price' => $request->price,
        'image' => $imagePath, // Tambahkan ini
    ]);
    return redirect()->route('admin.product')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function destroy($id): RedirectResponse {
        // Cari produk berdasarkan ID
        $product = Product::find($id);
        
        // Cek apakah produk ditemukan
        if (!$product) {
            return redirect()->route('admin.product')->with('error', 'Produk tidak ditemukan!');
        }
    
        // Hapus produk
        $product->delete();
    
        // Redirect dengan pesan sukses
        return redirect()->route('admin.product')->with('success', 'Produk berhasil dihapus!');
    }

    public function update(Request $request, $id)
{

    $validated = $request->validate([
        'category' => 'required|in:Nail Art,Nail Extension,Press On Nails',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
       ]);

    try {
        $product = Product::findOrFail($id);

        $product->update($validated);
     
        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Produk berhasil diperbarui!'
        ]);

    } catch (\Exception $e) {
        return redirect()->back()->with([
            'status' => 'error',
            'message' => 'Gagal memperbarui produk: '.$e->getMessage()
        ])->withInput();
    }
}


    
}
