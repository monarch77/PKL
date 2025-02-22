@extends('layouts.sidebar_user')

@section('title', 'Ubah Password')

@section('content')

<link rel="stylesheet" href="{{ asset('css/profile/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/modal/style.css') }}"> <!-- Modal View -->
<link rel="stylesheet" href="{{ asset('css/layout/alert.css') }}"> <!-- Notif Toast -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="container-1">
    <header>Change Password</header>

    <form id="changePasswordForm" class="form" action="{{ route('profile.updatePassword') }}" method="POST">
        @csrf
        <div class="details">
            <div class="fields">
                <div class="input-fields">
                    <label>Password Lama</label>
                    <input type="password" name="current_password" id="current_password">
                    <i class="fas fa-eye toggle-password" onclick="togglePasswordVisibility('current_password')"></i>
                </div>
                <div class="input-fields">
                    <label>Password Baru</label>
                    <input type="password" name="new_password" id="new_password">
                    <i class="fas fa-eye toggle-password" onclick="togglePasswordVisibility('new_password')"></i>
                </div>
                <div class="input-fields">
                    <label>Konfirmasi Password Baru</label>
                    <input type="password" name="new_password_confirmation" id="confirm_new_password">
                    <i class="fas fa-eye toggle-password" onclick="togglePasswordVisibility('confirm_new_password')"></i>
                </div>

                <button type="submit" class="submitBtn">
                    <span class="btnText">Ubah Password</span>
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
        </div>
    </form>


</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('js/alert.js') }}"></script>
<script src="{{ asset('js/login/app.js') }}"></script>


@include('user.modal.index')
@endsection