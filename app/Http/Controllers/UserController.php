<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function index (){
        $user = Auth::user();
        return view(('user.dashboard'), compact('user'));
    }

    function klaim (){
        $user = Auth::user();
        $claims = $user->claims()->orderBy('created_at', 'desc')->get();
        return view(('user.klaim'), compact('user', 'claims'));
    }

    function ajukanklaim (){
        $user = Auth::user();
        return view(('user.pengajuan_klaim'), compact('user'));
    }
}
