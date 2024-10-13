<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/registrasi/styleForm.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Form Registrasi</title>
</head>

<body>
    <div class="container-1">
        <header>Form Registrasi</header>

        <form action="{{ route('completeProfile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form first">
                <div class="details">
                    <div class="fields">
                        <div class="profile-container">
                            <div class="profile-pic" onclick="triggerFileUpload()">
                                <img src="{{ asset('images/register/anonymous-pic.png') }}" id="profile-image" alt="foto profil">
                            </div>
                            <input type="file" id="file-upload" name="profile_picture" accept=".jpg, .jpeg, .png" onchange="previewImage(event)" required>
                            <label for="profile-pic">Foto Profil</label>
                        </div>
                        <div class="input-fields">
                            <label>Nama Lengkap</label>
                            <input type="text" name="name" placeholder="Masukkan Nama Lengkap" required>
                        </div>
                        <div class="input-fields">
                            <label>Alamat</label>
                            <textarea type="date" name="address" placeholder="Masukkan Alamat" required></textarea>
                        </div>
                        <div class="input-fields">
                            <label>No Telepon</label>
                            <input type="number" name="phone_number" placeholder="Masukkan No Telepon" required>
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
                            <label>Role</label>
                            <select id="role" name="role" required>
                                <option value="" disabled selected>Pilih Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button class="submitBtn">
                    <span class="btnText">Submit</span>
                </button>

            </div>

        </form>
    </div>
    <script src="{{ asset('js/register/script.js') }}"></script>
</body>

</html>