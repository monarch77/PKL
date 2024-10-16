@extends('layouts.sidebar_user')

@section('title', 'Edit Klaim')

@section('content')
<div class="container">
    <h2>Edit Data Klaim</h2>

    <form action="{{ route('klaim.update', $claim->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="no_polis">No Polis</label>
            <input type="text" name="no_polis" value="{{ $claim->no_polis }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" value="{{ $claim->name }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{ $claim->tanggal_lahir }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="no_polis">No HP</label>
            <input type="number" name="no_hp" value="{{ $claim->no_hp }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <input type="text" name="gender" value="{{ $claim->gender }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" name="pekerjaan" value="{{ $claim->pekerjaan }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="id_type">ID Type</label>
            <input type="text" name="id_type" value="{{ $claim->id_type }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="id_number">ID number</label>
            <input type="number" name="id_number" value="{{ $claim->id_number }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="issued_date">Issued Date</label>
            <input type="date" name="issued_date" value="{{ $claim->issued_date }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="issued_state">Issued Date</label>
            <input type="text" name="issued_state" value="{{ $claim->issued_state }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="issued_authority">Issued Authority</label>
            <input type="text" name="issued_authority" value="{{ $claim->issued_authority }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="expired_date">Expired Date</label>
            <input type="date" name="expired_date" value="{{ $claim->expired_date }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address_type">Address Type</label>
            <input type="text" name="address_type" value="{{ $claim->address_type }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="provinsi">Provinsi</label>
            <input type="text" name="provinsi" value="{{ $claim->provinsi }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kota_kabupaten">Kota/Kabupaten</label>
            <input type="text" name="kota_kabupaten" value="{{ $claim->kota_kabupaten }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kecamatan_kelurahan">Kecamatan/Kelurahan</label>
            <input type="text" name="kecamatan_kelurahan" value="{{ $claim->kecamatan_kelurahan }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="rt_rw">RT/RW</label>
            <input type="text" name="rt_rw" value="{{ $claim->rt_rw }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kode_pos">Kode Pos</label>
            <input type="text" name="kode_pos" value="{{ $claim->kode_pos }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="claim_type">Jenis Claim</label>
            <input type="text" name="claim_type" value="{{ $claim->claim_type }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tanggal_kejadian">Tanggal Kejadian</label>
            <input type="date" name="tanggal_kejadian" value="{{ $claim->tanggal_kejadian }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nominal_claim">Nominal Klaim</label>
            <input type="number" name="nominal_claim" value="{{ $claim->nominal_claim }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="deskripsi_kejadian">Deskripsi</label>
            <textarea name="deskripsi_kejadian" class="form-control" required>{{ $claim->deskripsi_kejadian }}</textarea>
        </div>
        <div class="form-group">
            <label for="dokumen_pendukung">Dokumen Pendukung</label>
            <input type="file" name="dokumen_pendukung[]" class="form-control" multiple>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection