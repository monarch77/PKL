<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Claim;
use App\Models\User;

class AdminController extends Controller
{
    function index()
    {
        $user = Auth::user();
        $claims = Claim::orderBy('created_at', 'desc')->take(3)->get();
        $totalKlaim = Claim::count();
        $totalKlaimDisetujui = Claim::where('status', 'Disetujui')->count();
        $totalKlaimDitolak = Claim::where('status', 'Ditolak')->count();
        $totalKlaimMenunggu = Claim::where('status', 'Menunggu')->count();
        
        $totalUser = User::where('role', 'user')->count();
        $totalAkunAktif = User::where('role', 'user')->where('status', 'Aktif')->count();
        $totalAkunNonaktif = User::where('role', 'user')->where('status', 'Tidak Aktif')->count();

        return view(('admin.dashboard'), compact('user','claims',  'totalKlaim', 'totalKlaimDisetujui',
         'totalKlaimDitolak', 'totalKlaimMenunggu' , 'totalUser', 'totalAkunAktif', 'totalAkunNonaktif'));
    }

    public function showAllClaims()
    {
        $user = Auth::user();
        $claims = Claim::orderBy('created_at', 'desc')->get();
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

    public function indexUser()
    {
        $user = Auth::user();
        $users = User::where('role', '!=', 'admin')->get();
        // $users = User::all();
        return view('admin.akun', compact('user', 'users'));
    }

    public function editUser($id)
    {
        $user = Auth::user();
        $users = User::where('role', 'user')->findOrFail($id);
        $pengguna = User::where('role', 'user')->findOrFail($id);
        return view('admin.edit', compact('user', 'users', 'pengguna'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'role' => 'required',
            'status' => 'required'
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();

        return redirect()->route('admin.akun')->with('edit_success', 'Data User Berhasil Diperbarui');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.akun')->with('delete_success', 'Data User Berhasil Dihapus');
    }

    public function laporan()
    {
        $user = Auth::user();
        $totalKlaim = Claim::count();
        $totalKlaimDisetujui = Claim::where('status', 'Disetujui')->count();
        $totalKlaimDitolak = Claim::where('status', 'Ditolak')->count();
        $totalKlaimMenunggu = Claim::where('status', 'Menunggu')->count();

        $klaimPerJenis = Claim::select('claim_type', Claim::raw('count(*) as total'))->groupBy('claim_type')->pluck('total', 'claim_type');

        $klaimLabels = $klaimPerJenis->keys();
        $klaimData = $klaimPerJenis->values();

        return view(('admin.laporan'), compact('user', 'totalKlaim', 'totalKlaimDisetujui', 'totalKlaimDitolak', 'totalKlaimMenunggu', 'klaimLabels', 'klaimData'));



    }
}
