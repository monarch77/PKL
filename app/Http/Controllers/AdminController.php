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
        return view(('admin.laporan'), compact('user'));
    }
}
