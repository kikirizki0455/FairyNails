<?php
namespace App\Http\Controllers ;

use App\Models\Product;
use App\Models\Transactions;
use App\Models\Vouchers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalVouchers = Vouchers::count();
        $totalTransactions = Transactions::count();
        
        // Total pendapatan dari transaksi 'completed'
        $totalRevenue = Transactions::where('payment_status', 'completed')->sum('total_amount');
    
        // Pendapatan bulan ini
        $monthlyRevenue = Transactions::where('payment_status', 'completed')
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->sum('total_amount');
    
        // Pendapatan hari ini
        $dailyRevenue = Transactions::where('payment_status', 'completed')
            ->whereDate('created_at', date('Y-m-d'))
            ->sum('total_amount');
    
        // Transaksi terbaru (ambil 5 transaksi terakhir)
        $recentTransactions = Transactions::latest()->take(5)->get(); 
    
        $topUsers = User::orderByRaw("
        FIELD(level, 'platinum', 'gold', 'silver', 'bronze') ASC")
        ->orderByDesc('exp')
        ->take(5)
        ->get(['name','email','points', 'level', 'exp']);
 
        $monthlyRevenueData = Transactions::where('payment_status', 'completed')
        ->selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
        ->whereYear('created_at', date('Y'))
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('total', 'month')
        ->toArray();

        $productCategories = Product::select('category', DB::raw('count(*) as total'))
        ->groupBy('category')
        ->pluck('total', 'category')
        ->toArray();

        $productCategoryCounts = Product::select('category', DB::raw('COUNT(*) as total'))
        ->groupBy('category')
        ->pluck('total', 'category')
        ->toArray();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalProducts',
            'totalVouchers',
            'totalTransactions',
            'totalRevenue',
            'monthlyRevenue',
            'dailyRevenue',
            'recentTransactions',
            'topUsers',
            'monthlyRevenueData',
            'productCategories',
            'productCategoryCounts'
        ));
    }
    


   }
