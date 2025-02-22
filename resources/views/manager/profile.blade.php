@extends('layouts.sidebar_manager')

@section('title', 'Profile')

@section('content')

<link rel="stylesheet" href="{{ asset('css/profile/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/modal/style.css') }}"> <!-- Modal View -->
<link rel="stylesheet" href="{{ asset('css/layout/alert.css') }}"> <!-- Notif Toast -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="container-1">
    <header>Profil Pengguna</header>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form first">
            <div class="details">
                <div class="fields">
                    <div class="profile-container">
                        <div class="profile-pic" onclick="triggerFileUpload()">
                            <img src="{{ asset('storage/' . $user->profile_picture) }}" id="profile-image" alt="foto profil">
                        </div>
                        <input type="file" id="file-upload" name="profile_picture" accept=".jpg, .jpeg, .png" onchange="previewImage(event)" style="display: none;">
                        <label for="profile-pic">Foto Profil</label>
                    </div>
                    <div class="input-fields">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" value="{{ $user->name }}" readonly>
                    </div>
                    <div class="input-fields">
                        <label>Alamat</label>
                        <input type="text" name="address" value="{{ $user->address }}" readonly>
                    </div>
                    <div class="input-fields">
                        <label>No Telepon</label>
                        <input type="number" name="phone_number" value="{{ $user->phone_number }}" readonly>
                    </div>
                    <div class="input-fields">
                        <label for="gender">Jenis Kelamin</label>
                        <select name="gender" id="gender" disabled>
                            <option value="Laki-laki" {{ $user->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $user->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="input-fields">
                        <label>Role</label>
                        <input type="text" name="role" value="{{ $user->role }}" readonly>
                    </div>
                </div>
            </div>

            <button type="button" class="submitBtn">
                <span class="btnText">Edit</span>
            </button>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </form>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('js/alert.js') }}"></script>
<script src="{{ asset('js/profile/script.js') }}"></script>


@include('user.modal.index')
@endsection