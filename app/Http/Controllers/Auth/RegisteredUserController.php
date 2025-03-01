<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PendingUser;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Events\PendingUserRegistered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
   
public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:pending_users,email'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'phone' => ['required', 'string', 'max:15'],
        'address' => ['required', 'string', 'max:255'],
        'birthdate' => ['required', 'date'],
        'gender' => ['required', 'in:male,female'],
    ]);

    $user = PendingUser::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'phone' => $request->phone,
        'address' => $request->address,
        'birthdate' => $request->birthdate,
        'gender' => $request->gender,
    ]);

    // Kirim event khusus untuk pending user
    event(new PendingUserRegistered($user));

    return redirect(route('login', absolute: false))->with('status', 'Registrasi berhasil! Akun Anda sedang menunggu validasi admin.');
}
}