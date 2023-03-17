<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login_view() {

        return view('admin.pages.login');

    }

    public function authenticate(Request $request) {

        $credentials = $request->validate([

            'email' => ['required','email:dns'],
            'password' => 'required'

        ]);

        // dd('berhasil login');

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Email / Password salah bray!');

    }

    public function logout() {

        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        
        return redirect('/login');

    }
}
