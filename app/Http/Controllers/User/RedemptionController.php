<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserVouchers;
use App\Models\Vouchers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RedemptionController extends Controller
{
    public function redeem()
    {
        $vouchers = Vouchers::latest()->paginate(10);

        $userVouchers = UserVouchers::latest()->paginate(10);
        $userVouchers = [];
        if (Auth::check()) {
            $userVouchers = UserVouchers::where('user_id', Auth::id()) // Ambil berdasarkan user yang login
                ->where('is_used', 0) // Hanya voucher yang belum digunakan
                ->whereDate('expire_date', '>=', Carbon::today()) // Hanya voucher yang belum kadaluarsa
                ->with('voucher') // Ambil relasi dengan tabel voucher
                ->get();
        }
        return view('user.redemption.redeem', compact('vouchers', 'userVouchers'));
    }

    public function collection(Request $request)
    {
        // Validasi input
        $request->validate([
            'voucher_id' => 'required|exists:vouchers,id',
        ]);

        // Ambil user yang sedang login
        $user = Auth::user();
        if (!$user) {
            return redirect()->back()->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Ambil voucher berdasarkan ID
        $voucher = Vouchers::find($request->voucher_id);
        if (!$voucher) {
            return redirect()->back()->with('error', 'Voucher tidak ditemukan.');
        }

        // Cek apakah poin mencukupi
        if ($user->points < $voucher->points_required) {
            return redirect()->back()->with('error', 'Poin tidak mencukupi untuk menukar voucher ini.');
        }

        // Kurangi poin pengguna menggunakan query builder
        DB::table('users')
            ->where('id', $user->id)
            ->decrement('points', $voucher->points_required);

        // Tambahkan voucher ke pengguna
        UserVouchers::create([
            'user_id' => $user->id,
            'voucher_id' => $voucher->id,
            'is_used' => false,
            'expire_date' => now()->addDays(30),
        ]);

        return redirect()->back()->with('success', 'Voucher berhasil ditukar!');
    }
 
}
