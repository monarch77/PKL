<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index (){
        $user = Auth::user();
        return view(('admin.dashboard'), compact('user'));
    }

    public function klaim()
    {
        $user = Auth::user();
        $claims = $user->claims;
        return view(('admin.klaim'), compact('user'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view(('admin.profile'), compact('user'));
    }

    public function laporan()
    {
        $user = Auth::user();
        return view(('admin.laporan'), compact('user'));
    }
}
