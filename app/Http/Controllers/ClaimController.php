<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Claim;
use Illuminate\Support\Facades\Auth;

class ClaimController extends Controller
{
    public function create() {
        return view('user.pengajuan_klaim');
    }

    public function store(Request $request) {
        $request->validate([
            'policy_number' => 'required',
            'claim_type' => 'required',
            'description' => 'required',
        ]);

        Claim::create([
            'user_id' => Auth::id(),
            'policy_number' => $request->policy_number,
            'claim_type' => $request->claim_type,
            'description' => $request->description,
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Klaim berhasil diajukan');
    }
}
