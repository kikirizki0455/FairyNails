<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transactions;
use App\Models\User;
use App\Models\UserVouchers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        
        $monthlyExpenses = [1000, 2000, 1500, 1700, 1800, 1900, 2200, 2500, 2300, 2100, 2000, 1900]; 
        $user = Auth::user();// Ambil user yang sedang login
        
       

        $userWithTransactions = User::where('id', $user->id)
        ->withCount('transactions') // Menghitung jumlah transaksi
        ->withSum('transactions', 'total_amount') // Menjumlahkan total_amount dari transaksi
        ->first();
        
        $transactions = Transactions::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
            
        
        $products = Product::all();
        // Ambil nilai dari hasil query
        $totalTransactions = $data->total_transactions ?? 0;
        $totalSpending = $data->total_spending ?? 0;
        $totalVoucher = UserVouchers::where('user_id', $user->id)->count();
        return view('user.dashboard',
        compact(
            'monthlyExpenses',
            'userWithTransactions',
            'totalVoucher',
            'totalTransactions',
            'totalSpending',
            'products',
            'transactions'
    ));

    }
}
