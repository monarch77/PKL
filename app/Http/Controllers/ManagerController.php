<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ManagerController extends Controller
{
    function index (){
        $user = Auth::user();

        $totalUser = User::where('role', 'nasabah')->count();
        $totalAkunAktif = User::where('role', 'nasabah')->where('status', 'Aktif')->count();
        $totalAkunNonaktif = User::where('role', 'nasabah')->where('status', 'Tidak Aktif')->count();

        return view(('manager.dashboard'), compact('user', 'totalUser', 'totalAkunAktif', 'totalAkunNonaktif'));
    }

    public function indexUser()
    {
        $user = Auth::user();
        $users = User::where('role', '!=', 'admin')->get();
        // $users = User::all();
        return view('manager.akun', compact('user', 'users'));
    }

    public function editUser($id)
    {
        $user = Auth::user();
        $users = User::where('role', 'user')->findOrFail($id);
        $pengguna = User::where('role', 'user')->findOrFail($id);
        return view('manager.edit', compact('user', 'users', 'pengguna'));
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

        return redirect()->route('manager.akun')->with('edit_success', 'Data User Berhasil Diperbarui');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('manager.akun')->with('delete_success', 'Data User Berhasil Dihapus');
    }
}
