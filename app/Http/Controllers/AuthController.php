<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Form login
    public function showLogin() {
        return view('auth.login');

    }

    // Proses login
    public function login(Request $request) 
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
            
        }
        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

        // Form register
        public function showRegister() {
            return view('auth.register');
        }

        // Proses register
        public function register(Request $request) {

        // Request / Validasi input
         $request->validate([
         'name' => 'required',
         'email' =>'required|email|unique:users',
         'password'  => 'required|min:6|confirmed',
         ]);
         
        //  Save in database
         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            
         ]);
        

        // Daftar akun, login otomatis
         Auth::login($user);
        return redirect()->route('home')->with('success', 'Registrasi berhasil!');
        }

        // Logout 
      public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/home')->with('success', 'Anda berhasil logout!');
        }



}
