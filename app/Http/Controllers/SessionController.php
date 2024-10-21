<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class SessionController extends Controller
{
    function index()
    {
        return view('login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->status !== 'Aktif') {
                Auth::logout();
                return redirect()->back()->withErrors(['login' => 'Akun Anda tidak aktif, silahkan hubungi Administrator'])->withInput();
            }
            
            if (Auth::user()->role == 'admin') {
                return redirect('/admin/dashboard');
            } else if (Auth::user()->role == 'user') {
                return redirect('/user/dashboard');
            }
        } else {
            return redirect()->back()->withErrors(['login' => 'Username dan Password yang Dimasukkan Tidak Sesuai'])->withInput();
        }
    }

    function indexRegister()
    {
        return view('register');
    }

    function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'username' => 'required',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email Wajib Diisi',
            'email.unique' => 'Email Sudah Terdaftar',
            'username.required' => 'Username Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
            'password.min' => 'Password Minimal 6 Karakter',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'register')->withInput()->with('showRegister', true);
        }

        $user = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        Session::put('incomplete_profile', $user->id);

        return redirect()->route('showProfileForm')->with('success', 'Register Berhasil! Silahkan Lengkapi Profile');
    }

    function completeProfile(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'required|numeric',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'role' => 'required',
        ], [
            'profile_picture.required' => 'Foto Profil Wajib Diisi',
            'profile_picture.image' => 'Foto Profil Harus Berupa Gambar',
            'profile_picture.mimes' => 'Foto Profil Harus Berupa Gambar dengan Format jpeg, png, jpg, gif, svg',
            'profile_picture.max' => 'Ukuran Foto Profil Maksimal 2MB',
            'name.required' => 'Nama Wajib Diisi',
            'name.string' => 'Nama Harus Berupa Huruf',
            'address.required' => 'Alamat Wajib Diisi',
            'address.string' => 'Alamat Harus Berupa Huruf',
            'phone_number.required' => 'Nomor Telepon Wajib Diisi',
            'phone_number.numeric' => 'Nomor Telepon Harus Berupa Angka',
        ]);

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $fileName = time() . '-' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('profile_picture', $fileName, 'public');

            $user = Auth::user();
            $user->profile_picture = $filePath;
            $user->name = $request->name;
            $user->address = $request->address;
            $user->phone_number = $request->phone_number;
            $user->gender = $request->gender;
            $user->role = $request->role;
            $user->save();

            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Profile Berhasil Dilengkapi');
            } elseif (Auth::user()->role == 'user') {
                return redirect()->route('user.dashboard')->with('success', 'Profile Berhasil Dilengkapi');
            }
        }

        return redirect('/')->with('error', 'Role tidak valid.');
        
        // $user = User::find(Session::get('incomplete_profile'));

        // $user->update([
        //     'profile_picture' => $request->file('profile_picture')->store('profile_picture'),
        //     'name' => $request->name,
        //     'address' => $request->address,
        //     'phone_number' => $request->phone_number,
        //     'gender' => $request->gender,
        //     'role' => $request->role,
        // ]);

        // Session::forget('incomplete_profile');


    }
    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
