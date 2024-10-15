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
            <label for="claim_type">Jenis Klaim</label>
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
        @if ($errors->any())
        <div class="alert danger-alert">
            <ul>
                @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </form>
</div>
@endsection