@extends('layouts.sidebar_user')

@section('title', 'Pengajuan Klaim')

@section('content')

<link rel="stylesheet" href="{{ asset('css/klaim/style.css') }}">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<title>Pengajuan Klaim</title>

<div class="container-1">
    <header>Pengajuan Klaim</header>

    <form action="{{ route('klaim.store') }}" method="POST" enctype="multipart/form-data" id="klaimForm">
        @csrf
        <!-- Alert Success -->
        @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                    }
                });

                Toast.fire({
                    icon: 'success',
                    title: '{{ session("success") }}'
                });
            });
        </script>
        @endif
        <div class="form first">
            <div class="details">
                <span class="title">Personal Details</span>

                <div class="fields">
                    <div class="input-fields">
                        <label>No. Polis</label>
                        <input type="text" name="no_polis" placeholder="Masukkan No. Polis" required>
                    </div>
                    <div class="input-fields">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" value="{{ $user->name }}"  readonly>
                    </div>
                    <div class="input-fields">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" required>
                    </div>
                    <div class="input-fields">
                        <label>No Telepon</label>
                        <input type="number" name="no_hp" value="{{ $user->phone_number }}" readonly>
                    </div>
                    <div class="input-fields">
                        <label for="gender">Jenis Kelamin</label>
                        <input type="text" name="gender" value="{{ $user->gender }}"  readonly>
                    </div>
                    <div class="input-fields">
                        <label>Pekerjaan</label>
                        <input type="text" name="pekerjaan" placeholder="Masukkan Pekerjaan" required>
                    </div>
                </div>

            </div>

            <div class="details ID">
                <span class="title">Identity Details</span>

                <div class="fields">
                    <div class="input-fields">
                        <label>ID Type</label>
                        <select id="id-type" name="id_type" required>
                            <option value="" disabled selected>Pilih ID Type</option>
                            <option value="KTP">KTP</option>
                            <option value="Pasport">Pasport</option>
                        </select>
                    </div>
                    <div class="input-fields">
                        <label>ID Number</label>
                        <input type="number" name="id_number" placeholder="Masukkan ID Number" required>
                    </div>
                    <div class="input-fields">
                        <label>Issued Date</label>
                        <input type="date" name="issued_date" placeholder="Masukkan Issued Date" required>
                    </div>
                    <div class="input-fields">
                        <label>Issued State</label>
                        <input type="text" name="issued_state" placeholder="Masukkan Issued State" required>
                    </div>
                    <div class="input-fields">
                        <label>Issued Authority</label>
                        <input type="text" name="issued_authority" placeholder="Masukkan Issued Authority" required>
                    </div>
                    <div class="input-fields">
                        <label>Expired Date</label>
                        <input type="date" name="expired_date" placeholder="Masukkan Expiry Date" required>
                    </div>
                </div>

                <button class="nextBtn">
                    <span class="btnText">Next</span>
                    <i class="uil uil-navigator"></i>
                </button>
            </div>
            @if ($errors->any())
            <div class="alert danger-alert">
                <ul>
                    @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>

        <div class="form second">
            <div class="details address">
                <span class="title">Address Details</span>

                <div class="fields">
                    <div class="input-fields">
                        <label>Address Type</label>
                        <select id="address-type" name="address_type" required>
                            <option value="" disabled selected>Pilih Address Type</option>
                            <option value="Permanent">Permanent</option>
                            <option value="Temporary">Temporary</option>
                        </select>
                    </div>
                    <div class="input-fields">
                        <label>Provinsi</label>
                        <input type="text" name="provinsi" placeholder="Masukkan Provinsi" required>
                    </div>
                    <div class="input-fields">
                        <label>Kota/Kabupaten</label>
                        <input type="text" name="kota_kabupaten" placeholder="Masukkan Kota/Kabupaten" required>
                    </div>
                    <div class="input-fields">
                        <label>Kecamatan/Kelurahan</label>
                        <input type="text" name="kecamatan_kelurahan" placeholder="Masukkan Kecamatan/kelurahan" required>
                    </div>
                    <div class="input-fields">
                        <label>RT/RW</label>
                        <input type="text" name="rt_rw" placeholder="Masukkan RT/RW" required>
                    </div>
                    <div class="input-fields">
                        <label>Kode Pos</label>
                        <input type="number" name="kode_pos" placeholder="Masukkan Kode Pos" required>
                    </div>
                </div>

            </div>

            <div class="details claim">
                <span class="title">Claim Details</span>

                <div class="fields">
                    <div class="input-fields">
                        <label>Jenis Klaim</label>
                        <select id="claim-type" name="claim_type" required>
                            <option value="" disabled selected>Pilih Jenis Klaim</option>
                            <option value="Kesehatan">Kesehatan</option>
                            <option value="Kecelakaan">Kecelakaan</option>
                            <option value="Properti">Kerusakan Properti</option>
                        </select>
                    </div>
                    <div class="input-fields">
                        <label>Tanggal Kejadian</label>
                        <input type="date" name="tanggal_kejadian" placeholder="Masukkan Tanggal Kejadian" required>
                    </div>
                    <div class="input-fields">
                        <label>Nominal Klaim</label>
                        <input type="text" name="nominal_claim" id="nominal-claim" placeholder="Masukkan Nominal Klaim" required>
                    </div>
                    <div class="input-fields deskripsi">
                        <label>Deskripsi Singkat Kejadian</label>
                        <textarea name="deskripsi_kejadian" placeholder="Masukkan Deskripsi Singkat" required></textarea>
                    </div>
                    <div class="input-fields dokumen">
                        <label>Dokumen Pendukung</label>
                        <input type="file" name="dokumen_pendukung[]" accept=".jpg, .jpeg, .png, .pdf" multiple required>
                    </div>
                </div>

                <div class="buttons">
                    <div class="backBtn">
                        <i class="uil uil-navigator"></i>
                        <span class="btnText">Back</span>
                    </div>
                    <button class="submitBtn">
                        <span class="btnText">Submit</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('js/alert.js') }}"></script>
<script src="{{ asset('js/klaim/script.js') }}"></script>

@endsection