<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PendingUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserValidationController extends Controller
{
    // Menampilkan daftar user yang perlu divalidasi
    public function index()
    {
        $pendingUsers = PendingUser::all();
        return view('admin.userValidations', compact('pendingUsers'));
    }

    // Menyetujui user dan memindahkan ke tabel users
    public function approve($id)
    {
        $pendingUser = PendingUser::findOrFail($id);

        // Buat user baru
        User::create([
            'name' => $pendingUser->name,
            'phone' => $pendingUser->phone,
            'address' => $pendingUser->address,
            'birthdate' => $pendingUser->birthdate,
            'gender' => $pendingUser->gender,
            'email' => $pendingUser->email,
            'password' => $pendingUser->password,
        ]);

        // Hapus dari tabel pending_users
        $pendingUser->delete();

        return redirect()->route('admin.user-validation.index')->with('success', 'User berhasil disetujui.');
    }

    // Menolak user dan menghapus dari tabel pending_users
    public function reject($id)
    {
        $pendingUser = PendingUser::findOrFail($id);
        $pendingUser->delete();

        return redirect()->route('admin.user-validation.index')->with('success', 'User berhasil ditolak.');
    }
}