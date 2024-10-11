@extends('layouts.sidebar_user')

@section('title', 'Pengajuan Klaim')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/registrasi/style.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Pengajuan Klaim</title>
</head>

<body>
    <div class="container-1">
        <header>Pengajuan Klaim</header>

        <form action="#">
            <div class="form first">
                <div class="details">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-fields">
                            <label>Nama Lengkap</label>
                            <input type="text" placeholder="Masukkan Nama Lengkap" required>
                        </div>
                        <div class="input-fields">
                            <label>Tanggal Lahir</label>
                            <input type="date" placeholder="Masukkan Tanggal Lahir" required>
                        </div>
                        <div class="input-fields">
                            <label>No Telepon</label>
                            <input type="number" placeholder="Masukkan No Telepon" required>
                        </div>
                        <div class="input-fields">
                            <label for="gender">Jenis Kelamin</label>
                            <select id="gender" name="gender" required>
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="input-fields">
                            <label>Pekerjaan</label>
                            <input type="text" placeholder="Masukkan Pekerjaan" required>
                        </div>
                        <div class="input-fields">
                            <label>Email</label>
                            <input type="text" placeholder="Masukkan Email" required>
                        </div>
                    </div>

                </div>

                <div class="details ID">
                    <span class="title">Identity Details</span>

                    <div class="fields">
                        <div class="input-fields">
                            <label>ID Type</label>
                            <select id="id-type" name="id-type" required>
                                <option value="" disabled selected>Pilih ID Type</option>
                                <option value="KTP">KTP</option>
                                <option value="Pasport">Pasport</option>
                            </select>
                        </div>
                        <div class="input-fields">
                            <label>ID Number</label>
                            <input type="number" placeholder="Masukkan ID Number" required>
                        </div>
                        <div class="input-fields">
                            <label>Issued Date</label>
                            <input type="date" placeholder="Masukkan Issued Date" required>
                        </div>
                        <div class="input-fields">
                            <label>Issued State</label>
                            <input type="text" placeholder="Masukkan Issued State" required>
                        </div>
                        <div class="input-fields">
                            <label>Issued Authority</label>
                            <input type="text" placeholder="Masukkan Issued Authority" required>
                        </div>
                        <div class="input-fields">
                            <label>Expiry Date</label>
                            <input type="date" placeholder="Masukkan Expiry Date" required>
                        </div>
                    </div>

                    <button class="nextBtn">
                        <span class="btnText">Next</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div>
            </div>

            <div class="form second">
                <div class="details address">
                    <span class="title">Address Details</span>

                    <div class="fields">
                        <div class="input-fields">
                            <label>Address Type</label>
                            <select id="address-type" name="address-type" required>
                                <option value="" disabled selected>Pilih Address Type</option>
                                <option value="Permanent">Permanent</option>
                                <option value="Temporary">Temporary</option>
                            </select>
                        </div>
                        <div class="input-fields">
                            <label>Provinsi</label>
                            <input type="text" placeholder="Masukkan Provinsi" required>
                        </div>
                        <div class="input-fields">
                            <label>Kota/Kabupaten</label>
                            <input type="text" placeholder="Masukkan Kota/Kabupaten" required>
                        </div>
                        <div class="input-fields">
                            <label>Kecamatan/Kelurahan</label>
                            <input type="text" placeholder="Masukkan Kecamatan/kelurahan" required>
                        </div>
                        <div class="input-fields">
                            <label>RT/RW</label>
                            <input type="text" placeholder="Masukkan RT/RW" required>
                        </div>
                        <div class="input-fields">
                            <label>No. Rumah</label>
                            <input type="number" placeholder="Masukkan No. Rumah" required>
                        </div>
                    </div>

                </div>

                <div class="details claim">
                    <span class="title">Claim Details</span>

                    <div class="fields">
                        <div class="input-fields">
                            <label>Jenis Klaim</label>
                            <select id="claim-type" name="claim-type" required>
                                <option value="" disabled selected>Pilih Jenis Klaim</option>
                                <option value="kesehatan">Kesehatan</option>
                                <option value="kecelakaan">Kecelakaan</option>
                                <option value="properti">Kerusakan Properti</option>
                            </select>
                        </div>
                        <div class="input-fields">
                            <label>Tanggal Kejadian</label>
                            <input type="date" placeholder="Masukkan Tanggal Kejadian" required>
                        </div>
                        <div class="input-fields">
                            <label>Nominal Klaim</label>
                            <input type="text" id="nominal-klaim" placeholder="Masukkan Nominal Klaim" required>
                        </div>
                        <div class="input-fields deskripsi">
                            <label>Deskripsi Singkat Kejadian</label>
                            <textarea placeholder="Masukkan Deskripsi Singkat" required></textarea>
                        </div>
                        <div class="input-fields dokumen">
                            <label>Dokumen Pendukung</label>
                            <input type="file" accept=".jpg, .jpeg, .png, .pdf" multiple required>
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
    <script src="{{ asset('js/klaim/script.js') }}"></script>
</body>

</html>
@endsection