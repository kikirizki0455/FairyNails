<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user()
    {
        // Ambil daftar level unik dari tabel users
        $levels = User::select('level')->distinct()->pluck('level')->toArray();
        
        // Query dasar
        $query = User::query();
        
        // Filter berdasarkan level jika parameter level ada
        if (request()->has('level') && request('level') != '') {
            $query->where('level', request('level'));
        }
        
        // Filter berdasarkan search jika parameter search ada
        if (request()->has('search') && request('search') != '') {
            $searchTerm = request('search');
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('email', 'like', '%' . $searchTerm . '%')
                  ->orWhere('id', 'like', '%' . $searchTerm . '%');
            });
        }
        
        // Ambil data users sesuai filter
        $users = $query->latest()->paginate(10);
        
        return view('admin.member.member', compact('users', 'levels'));
    }
    public function updateUserExp($userId, $xpEarned)
    {
        $user = User::find($userId);
    
        if (!$user) {
            return;
        }
    
        // Pastikan level user dalam format Title Case (Bronze, Silver, dst.)
        $user->level = ucfirst(strtolower($user->level));
    
        // Batasan XP untuk tiap level
        $levelThresholds = [
            'Bronze'   => 1000,
            'Silver'   => 3000,
            'Gold'     => 7000,
            'Platinum' => PHP_INT_MAX // Tidak ada batas atas untuk Platinum
        ];
    
        // Simpan level sebelumnya
        $previousLevel = $user->level;
        $expBaru = $user->exp + $xpEarned;
    
        // Periksa batas level
        while (isset($levelThresholds[$previousLevel]) && $expBaru >= $levelThresholds[$previousLevel]) {
            $expBaru -= $levelThresholds[$previousLevel]; // Simpan sisa XP
    
            // Naik level
            switch ($previousLevel) {
                case 'Bronze':   $previousLevel = 'Silver'; break;
                case 'Silver':   $previousLevel = 'Gold'; break;
                case 'Gold':     $previousLevel = 'Platinum'; break;
                default: break;
            }
        }
    
        // Update EXP & Level baru
        $user->exp = $expBaru;
        $user->level = $previousLevel;
        $user->save();
    }
    


}
