<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Claim;

class AdminController extends Controller
{
    function index (){
        $user = Auth::user();
        return view(('admin.dashboard'), compact('user'));
    }

    public function showAllClaims()
    {
        $user = Auth::user();
        $claims = Claim::all();
        return view('admin.klaim', compact('user', 'claims'));
    }

    public function update(Request $request, $id)
    {
        $claim = Claim::findOrFail($id);

        if ($request->action == 'approve') {
            $claim->status = 'Disetujui';
        } else {
            $claim->status = 'Ditolak';
        }

        $claim->save();

        return redirect()->route('admin.klaim')->with('success', 'Status Klaim Telah Diperbarui');
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
