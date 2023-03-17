<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register_view() {

        return view('admin.pages.registration');

    }

    public function store(Request $request) {

        $validatedData = $request->validate([

            'name' => ['required','max:255'],
            'email' => ['required','email:dns','unique:users'],
            'password' => ['required','min:5','max:255']

        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        // dd('registrasi berhasil');
        User::create($validatedData);

        return redirect('/login')->with('success','Registrasi berhasil!');

    }
}
