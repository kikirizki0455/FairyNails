<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Redemption;
use App\Models\UserVouchers;
use App\Models\Vouchers;
use Illuminate\Http\Request;

class RedemptionsController extends Controller
{
    public function redeem()
    {
        $vouchers = Vouchers::latest()->paginate(10);
        $redeems = Redemption::latest()->paginate(10);
        $userVouchers = UserVouchers::latest()->paginate(10);

        return view('admin.redemption.redeem', compact('vouchers', 'redeems', 'userVouchers'));
    }
    public function create(){
        
        return view('admin.product.addProduct');
    }


    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:vouchers|max:50',
            'type' => 'required|in:percentage_discount,free_service',
            'value' => 'nullable|numeric',
            'product_category' => 'nullable|string|max:255',
            'points_required' => 'required|integer|min:1',
            'minimum_transaction' => 'required|numeric|min:0',
            'description' => 'nullable|string'
        ]);
        
        // Penanganan conditional validation
        if ($validatedData['type'] === 'percentage_discount') {
            $request->validate([
                'value' => 'required|numeric|between:1,100'
            ]);
        }
    
        if ($validatedData['type'] === 'free_service') {
            $request->validate([
                'product_category' => 'required|string|max:255'
            ]);
        }
    
        // Simpan voucher ke database
        Vouchers::create([
            'name' => $validatedData['name'],
            'code' => $validatedData['code'],
            'type' => $validatedData['type'],
            'value' => $validatedData['type'] === 'percentage_discount' ? $validatedData['value'] : null,
            'product_category' => $validatedData['type'] === 'free_service' ? $validatedData['product_category'] : null,
            'points_required' => $validatedData['points_required'],
            'minimum_transaction' => $validatedData['minimum_transaction'],
            'description' => $validatedData['description']
        ]);
    
        return redirect()->route('admin.redeem')
            ->with('success', 'Voucher berhasil ditambahkan!');
    }
}
