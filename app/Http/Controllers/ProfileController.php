<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|numeric',
            'gender' => 'required|string',
        ], [
            'profile_picture.image' => 'Foto profil harus berupa gambar.',
            'profile_picture.mimes' => 'Foto profil harus berformat jpg, jpeg, png.',
            'profile_picture.max' => 'Ukuran foto profil maksimal 2MB.',
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa huruf.',
            'name.max' => 'Nama maksimal 255 karakter.',
            'address.required' => 'Alamat wajib diisi.',
            'address.string' => 'Alamat harus berupa huruf.',
            'address.max' => 'Alamat maksimal 255 karakter.',
            'phone_number.required' => 'Nomor telepon wajib diisi.',
            'phone_number.numeric' => 'Nomor telepon harus berupa angka.'
        ]);

        $user = auth()->user();

        // Update gambar profil jika ada
        if ($request->hasFile('profile_picture')) {
            $profilePicture = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $profilePicture;
        }

        // Update data lainnya
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->gender = $request->gender;

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:6',
        ], [
            'current_password.required' => 'Kata sandi saat ini wajib diisi.',
            'new_password.required' => 'Kata sandi baru wajib diisi.',
            'new_password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'new_password.min' => 'Kata sandi minimal 6 karakter.',
        ]);

        $user = auth()->user();

        if (!password_verify($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Kata sandi saat ini salah.');
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Kata sandi berhasil diperbarui.');

    }
}
