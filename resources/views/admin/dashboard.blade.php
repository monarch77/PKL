@extends('layouts.sidebar_admin')

@section('title', 'Dashboard Admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/klaim/indexStyle.css') }}"> <!-- Tampilan Klaim -->
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

    <div class="container-2 akun">
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

    <div class="container-2">
        <header>Klaim Terbaru</header>

        <div class="recent-claim">
            @if ($claims->isEmpty())

            <p>Tidak ada klaim yang ditemukan</p>
            @else

            <table>
                <thead>
                    <tr>
                        <th>No. Polis</th>
                        <th>Nama</th>
                        <th>Jenis Klaim</th>
                        <th>Nominal Klaim</th>
                        <th>Status</th>
                        <th>Tanggal Diajukan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($claims as $claim)
                    <tr>
                        <td>{{ $claim->no_polis }}</td>
                        <td>{{ $claim->user->name }}</td>
                        <td>{{ $claim->claim_type }}</td>
                        <td>Rp. {{ number_format($claim->nominal_claim, 0, ',', '.') }}</td>
                        <td>
                            <span class="status
                                @if($claim->status === 'Menunggu')
                                    @if (Auth::user()->role === 'manager') menunggu
                                    @else diproses
                                    @endif 
                                @elseif($claim->status === 'Disetujui') disetujui
                                @elseif($claim->status === 'Ditolak') ditolak
                                @endif">
                                @if($claim->status === 'Menunggu')
                                @if(Auth::user()->role === 'manager')
                                {{ $claim->status }}
                                @else
                                Diproses
                                @endif
                                @else
                                {{ $claim->status }}
                                @endif
                            </span>
                        </td>
                        <td>{{ $claim->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/chart.js') }}"></script>
    @endsection