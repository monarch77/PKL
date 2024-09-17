<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileAdminController extends Controller
{
    public function profile()
    {
        return view('admin/profile');
    }
}
