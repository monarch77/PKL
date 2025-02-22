@extends('layouts.sidebar_manager')

@section('title', 'Dashboard Admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/klaim/indexStyle.css') }}"> <!-- Tampilan Dashboard -->
<link rel="stylesheet" href="{{ asset('css/chart/style.css') }}"> <!-- Tampilan Grafik -->

<div class="dashboard-container">

    <div class="container-2">
        <header>Informasi Akun</header>

        <div class="statistik-section">
            <div class="statistik-container">
                <div class="statistik-item total">
                    <h4>Total</h4>
                    <p class="angka">{{$totalUser}}</p>
                </div>
                <div class="statistik-item aktif">
                    <h4>Aktif</h4>
                    <p class="angka">{{$totalAkunAktif}}</p>
                </div>
                <div class="statistik-item nonaktif">
                    <h4>Tidak Aktif</h4>
                    <p class="angka">{{$totalAkunNonaktif}}</p>
                </div>
            </div>
        </div>

    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/chart.js') }}"></script>
    @endsection