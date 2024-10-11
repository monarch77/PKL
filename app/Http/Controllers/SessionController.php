<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return redirect('')->withErrors('Username dan Password yang Dimasukkan Tidak Sesuai')->withInput();
        }
    }

    function indexRegister (){
        return view('register');
    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }
}
