<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class claimAdminController extends Controller
{
    public function klaim()
    {
        return view('admin/klaim');
    }
}
