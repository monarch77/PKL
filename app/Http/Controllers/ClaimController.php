<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Claim;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClaimController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_polis'=> 'required|numeric',
            'name' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|numeric',
            'gender' => 'required|string',
            'pekerjaan' => 'required|string',
            'id_type' => 'required|string',
            'id_number' => 'required|numeric',
            'issued_date' => 'required|date',
            'issued_state' => 'required|string',
            'issued_authority' => 'required|string',
            'expired_date' => 'required|date',
            'address_type' => 'required|string',
            'provinsi' => 'required|string',
            'kota_kabupaten' => 'required|string',
            'kecamatan_kelurahan' => 'required|string',
            'rt_rw' => 'required|string',
            'kode_pos' => 'required|numeric',
            'claim_type' => 'required|string',
            'tanggal_kejadian' => 'required|date',
            'nominal_claim' => 'required',
            'deskripsi_kejadian' => 'required|string',
            'dokumen_pendukung' => 'required|array',
            'dokumen_pendukung.*' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048'
        ]);

        // Hapus Rp. dan Titik Pemisah Ribuan
        $nominalClaim = str_replace(['Rp', '.'], '', $validatedData['nominal_claim']);

        // Handle File Upload
        $dokumenPaths = [];
        if ($request->hasFile('dokumen_pendukung')) {
            foreach ($request->file('dokumen_pendukung') as $file) {
                $originalName = $file->getClientOriginalName();
                $uniqueName = "Insura" . ' - ' . $originalName;
                $path = $file->storeAs('dokumen_klaim', $uniqueName, 'public');
                $dokumenPaths[] = $path;
            }
        }
        
        // Simpan Data ke Database
        Claim::create([
            'user_id' => Auth::id(),
            'no_polis' => $validatedData['no_polis'],
            'name' => $validatedData['name'],
            'tanggal_lahir' => $validatedData['tanggal_lahir'],
            'no_hp' => $validatedData['no_hp'],
            'gender' => $validatedData['gender'],
            'pekerjaan' => $validatedData['pekerjaan'],
            'id_type' => $validatedData['id_type'],
            'id_number' => $validatedData['id_number'],
            'issued_date' => $validatedData['issued_date'],
            'issued_state' => $validatedData['issued_state'],
            'issued_authority' => $validatedData['issued_authority'],
            'expired_date' => $validatedData['expired_date'],
            'address_type' => $validatedData['address_type'],
            'provinsi' => $validatedData['provinsi'],
            'kota_kabupaten' => $validatedData['kota_kabupaten'],
            'kecamatan_kelurahan' => $validatedData['kecamatan_kelurahan'],
            'rt_rw' => $validatedData['rt_rw'],
            'kode_pos' => $validatedData['kode_pos'],
            'claim_type' => $validatedData['claim_type'],
            'tanggal_kejadian' => $validatedData['tanggal_kejadian'],
            'nominal_claim' => $nominalClaim,
            'deskripsi_kejadian' => $validatedData['deskripsi_kejadian'],
            'dokumen_pendukung' => json_encode($dokumenPaths),
            'status' => 'Menunggu'
        ]);



        return redirect()->route('user.dashboard')->with('success', 'Klaim Berhasil Diajukan');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $claims = $user->claims;
        $claim = Claim::findOrFail($id);

        return view('user.edit', compact('user', 'claims', 'claim'));
    }

    public function update(Request $request, $id)
    {
        $claim = Claim::findOrFail($id);

        $validatedData = $request->validate([
            'no_polis'=> 'required',
            'name' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required',
            'gender' => 'required',
            'pekerjaan' => 'required',
            'id_type' => 'required',
            'id_number' => 'required',
            'issued_date' => 'required',
            'issued_state' => 'required',
            'issued_authority' => 'required',
            'expired_date' => 'required',
            'address_type' => 'required',
            'provinsi' => 'required',
            'kota_kabupaten' => 'required',
            'kecamatan_kelurahan' => 'required',
            'rt_rw' => 'required',
            'kode_pos' => 'required',
            'claim_type' => 'required',
            'tanggal_kejadian' => 'required',
            'nominal_claim' => 'required',
            'deskripsi_kejadian' => 'required',
            'dokumen_pendukung' => 'array',
            'dokumen_pendukung.*' => 'file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048'
        ]);
        
        $claim->no_polis = $request->no_polis;
        $claim->name = $request->name;
        $claim->tanggal_lahir = $request->tanggal_lahir;
        $claim->no_hp = $request->no_hp;
        $claim->gender = $request->gender;
        $claim->pekerjaan = $request->pekerjaan;
        $claim->id_type = $request->id_type;
        $claim->id_number = $request->id_number;
        $claim->issued_date = $request->issued_date;
        $claim->issued_state = $request->issued_state;
        $claim->issued_authority = $request->issued_authority;
        $claim->expired_date = $request->expired_date;
        $claim->address_type = $request->address_type;
        $claim->provinsi = $request->provinsi;
        $claim->kota_kabupaten = $request->kota_kabupaten;
        $claim->kecamatan_kelurahan = $request->kecamatan_kelurahan;
        $claim->rt_rw = $request->rt_rw;
        $claim->kode_pos = $request->kode_pos;
        $claim->claim_type = $request->claim_type;
        $claim->tanggal_kejadian = $request->tanggal_kejadian;
        $claim->nominal_claim = $request->nominal_claim;
        $claim->deskripsi_kejadian = $request->deskripsi_kejadian;

        if ($request->hasFile('dokumen_pendukung')) {
            $dokumenPaths = [];
            foreach ($request->file('dokumen_pendukung') as $file) {
                $path = $file->store('dokumen_klaim', 'public');
                $dokumenPaths[] = $path;
            }
            $claim->dokumen_pendukung = json_encode($dokumenPaths);
        }

        $claim->save();
        return redirect()->route('user.klaim')->with('edit_success', 'Klaim Berhasil Diperbarui');
    }
    public function destroy($id)
    {
        $claim = Claim::findOrFail($id);

        if ($claim->dokumen_pendukung) {
            $dokumen_pendukung = json_decode($claim->dokumen_pendukung);
            foreach ($dokumen_pendukung as $dokumen) {
                Storage::delete('public/' . $dokumen);
            }
        }
        
        $claim->delete();

        return redirect()->route('user.klaim')->with('delete_success', 'Klaim Berhasil Dihapus');
    }
}
