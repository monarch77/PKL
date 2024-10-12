<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class SessionController extends Controller
{
    function index (){
        return view('login');
    }

    function login (Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ],[
            'email.required'=>'Email Wajib Diisi',
            'password.required'=>'Password Wajib Diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)){
            if (Auth::user()->role == 'admin'){
                return redirect('/dashboardadmin');
            }else if (Auth::user()->role == 'user'){
                return redirect('/dashboarduser');
            }
        }else{
            return redirect()->back()->withErrors(['login' => 'Username dan Password yang Dimasukkan Tidak Sesuai'])->withInput();
        }
    }

    function indexRegister (){
        return view('register');
    }

    function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'username' => 'required',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email Wajib Diisi',
            'email.unique' => 'Email Sudah Terdaftar',
            'username.required' => 'Username Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
            'password.min' => 'Password Minimal 6 Karakter',
        ]);
        

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'register')->withInput()->with('showRegister', true);
        }

        User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('register')->with('success', 'Register Berhasil! Silahkan Login');
    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }
}
