<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Claim;
use Illuminate\Support\Facades\Auth;

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
}
