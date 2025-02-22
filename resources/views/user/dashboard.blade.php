@extends('layouts.sidebar_user')

@section('title', 'Dashboard Nasabah')

@section('content')
<link rel="stylesheet" href="{{ asset('css/klaim/indexStyle.css') }}"> <!-- Tampilan Dashboard -->
<link rel="stylesheet" href="{{ asset('css/chart/style.css') }}"> <!-- Tampilan Grafik -->

<div class="dashboard-container">
    <div class="container-2">
        <header>Informasi Klaim</header>

        <div class="laporan-section">
            <div class="statistik-container">
                <div class="statistik-item total">
                    <h4>Total</h4>
                    <p class="angka">{{ $totalKlaim }}</p>
                </div>
                <div class="statistik-item disetujui">
                    <h4>Disetujui</h4>
                    <p class="angka">{{ $totalKlaimDisetujui }}</p>
                </div>
                <div class="statistik-item ditolak">
                    <h4>Ditolak</h4>
                    <p class="angka">{{ $totalKlaimDitolak }}</p>
                </div>
                <div class="statistik-item menunggu">
                    <h4>Menunggu</h4>
                    <p class="angka">{{ $totalKlaimMenunggu }}</p>
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection