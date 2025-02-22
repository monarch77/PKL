<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Claim;

class UserController extends Controller
{
    function index()
    {
        $user = Auth::user();
        $totalKlaim = Claim::where('user_id', $user->id)->count();
        $totalKlaimDisetujui = Claim::where('user_id', $user->id)->where('status', 'Disetujui')->count();
        $totalKlaimDitolak = Claim::where('user_id', $user->id)->where('status', 'Ditolak')->count();
        $totalKlaimMenunggu = Claim::where('user_id', $user->id)->where('status', 'Menunggu')->count();

        return view(('user.dashboard'), compact('user', 'totalKlaim', 'totalKlaimDisetujui', 'totalKlaimDitolak', 'totalKlaimMenunggu'));
    }

    function klaim()
    {
        $user = Auth::user();
        $claims = $user->claims()->orderBy('created_at', 'desc')->get();
        return view(('user.klaim'), compact('user', 'claims'));
    }

    function ajukanklaim()
    {
        $user = Auth::user();
        return view(('user.pengajuan_klaim'), compact('user'));
    }

    function profile()
    {
        $user = Auth::user();
        return view(('user.profile'), compact('user'));
    }

    function password()
    {
        $user = Auth::user();
        return view(('user.password'), compact('user'));
    }
}
