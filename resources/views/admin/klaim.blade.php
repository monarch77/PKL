@extends('layouts.sidebar_admin')

@section('title', 'Klaim Asuransi')

@section('content')

<link rel="stylesheet" href="{{ asset('css/klaim/indexStyle.css') }}"> <!-- Tampilan Klaim -->
<link rel="stylesheet" href="{{ asset('css/modal/style.css') }}"> <!-- Modal View -->
<link rel="stylesheet" href="{{ asset('css/layout/alert.css') }}"> <!-- Notif Toast -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="container-1">
    <header>Manajemen Klaim</header>

    @if ($claims->where('status', 'Menunggu')->isEmpty())

    <p>Tidak ada klaim yang ditemukan.</p>
    @else
    <table>
        <thead>
            <tr>
                <th>No. Polis</th>
                <th>Nama</th>
                <th>Jenis Klaim</th>
                <th>Nominal Klaim</th>
                <th>Dokumen Pendukung</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach (($claims->where('status', 'Menunggu')) as $claim)
            <tr>
                <td>
                    <a href="" class="show-claim-modal"
                        data-id="{{ $claim->id }}"
                        data-polis="{{ $claim->no_polis }}"
                        data-nama="{{ $claim->name }}"
                        data-tanggal-lahir="{{ $claim->tanggal_lahir }}"
                        data-no-hp="{{ $claim->no_hp }}"
                        data-gender="{{ $claim->gender }}"
                        data-pekerjaan="{{ $claim->pekerjaan }}"
                        data-id-type="{{ $claim->id_type }}"
                        data-id-number="{{ $claim->id_number }}"
                        data-issued-date="{{ $claim->issued_date }}"
                        data-issued-authority="{{ $claim->issued_authority }}"
                        data-expired-date="{{ $claim->expired_date }}"
                        data-address-type="{{ $claim->address_type }}"
                        data-provinsi="{{ $claim->provinsi }}"
                        data-kota-kabupaten="{{ $claim->kota_kabupaten }}"
                        data-kecamatan-kelurahan="{{ $claim->kecamatan_kelurahan }}"
                        data-rt-rw="{{ $claim->rt_rw }}"
                        data-kode-pos="{{ $claim->kode_pos }}"
                        data-claim-type="{{ $claim->claim_type }}"
                        data-tanggal-kejadian="{{ $claim->tanggal_kejadian }}"
                        data-nominal-claim="Rp. {{ number_format($claim->nominal_claim, 0, ',', '.') }}"
                        data-deskripsi="{{ $claim->deskripsi_kejadian }}">
                        {{ $claim->no_polis }}
                    </a>
                </td>
                <td>{{ $claim->user->name }}</td>
                <td>{{ $claim->claim_type }}</td>
                <td>Rp. {{ number_format($claim->nominal_claim, 0, ',', '.') }}</td>
                <td>
                    <div class="file-container">
                        @foreach(json_decode($claim->dokumen_pendukung) as $dokumen)
                        @php
                        $extension = pathinfo($dokumen, PATHINFO_EXTENSION);
                        @endphp
                        <a href="{{ asset('storage/' . $dokumen) }}" class="file" target="_blank">
                            @if($extension == 'pdf')
                            <i class="fas fa-file-pdf fa-lg"></i>
                            @elseif($extension == 'docx' || $extension == 'doc')
                            <i class="fas fa-file-word fa-lg"></i>
                            @elseif(in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                            <i class="fas fa-file-image fa-lg"></i>
                        </a><br>
                        @endif
                        @endforeach
                    </div>
                </td>
                <td>
                    <span class="status
                            @if($claim->status === 'Menunggu') menunggu
                            @elseif($claim->status === 'Disetujui') disetujui
                            @elseif($claim->status === 'Ditolak') ditolak
                            @endif">
                        {{ $claim->status }}
                    </span>
                </td>
                <td>
                    <form action="{{ route('admin.klaim.update', $claim->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn-approve" name="action" value="approve">Setujui</button>
                        <button type="submit" class="btn-reject" name="action" value="reject">Tolak</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endif

</div>
<div class="container-1">
    <header>Riwayat Klaim</header>

    @if ($claims->whereIn('status', ['Disetujui', 'Ditolak'])->isEmpty())

    <p>Tidak ada klaim yang ditemukan.</p>
    @else
    <table>
        <thead>
            <tr>
                <th>No. Polis</th>
                <th>Nama</th>
                <th>Jenis Klaim</th>
                <th>Nominal Klaim</th>
                <th>Dokumen Pendukung</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach (($claims->whereIn('status', ['Disetujui', 'Ditolak'])) as $claim)
            <tr>
                <td>
                    <a href="" class="show-claim-modal"
                        data-id="{{ $claim->id }}"
                        data-polis="{{ $claim->no_polis }}"
                        data-nama="{{ $claim->name }}"
                        data-tanggal-lahir="{{ $claim->tanggal_lahir }}"
                        data-no-hp="{{ $claim->no_hp }}"
                        data-gender="{{ $claim->gender }}"
                        data-pekerjaan="{{ $claim->pekerjaan }}"
                        data-id-type="{{ $claim->id_type }}"
                        data-id-number="{{ $claim->id_number }}"
                        data-issued-date="{{ $claim->issued_date }}"
                        data-issued-authority="{{ $claim->issued_authority }}"
                        data-expired-date="{{ $claim->expired_date }}"
                        data-address-type="{{ $claim->address_type }}"
                        data-provinsi="{{ $claim->provinsi }}"
                        data-kota-kabupaten="{{ $claim->kota_kabupaten }}"
                        data-kecamatan-kelurahan="{{ $claim->kecamatan_kelurahan }}"
                        data-rt-rw="{{ $claim->rt_rw }}"
                        data-kode-pos="{{ $claim->kode_pos }}"
                        data-claim-type="{{ $claim->claim_type }}"
                        data-tanggal-kejadian="{{ $claim->tanggal_kejadian }}"
                        data-nominal-claim="Rp. {{ number_format($claim->nominal_claim, 0, ',', '.') }}"
                        data-deskripsi="{{ $claim->deskripsi_kejadian }}">
                        {{ $claim->no_polis }}
                    </a>
                </td>
                <td>{{ $claim->user->name }}</td>
                <td>{{ $claim->claim_type }}</td>
                <td>Rp. {{ number_format($claim->nominal_claim, 0, ',', '.') }}</td>
                <td>
                    <div class="file-container">
                        @foreach(json_decode($claim->dokumen_pendukung) as $dokumen)
                        @php
                        $extension = pathinfo($dokumen, PATHINFO_EXTENSION);
                        @endphp
                        <a href="{{ asset('storage/' . $dokumen) }}" class="file" target="_blank">
                            @if($extension == 'pdf')
                            <i class="fas fa-file-pdf fa-lg"></i>
                            @elseif($extension == 'docx' || $extension == 'doc')
                            <i class="fas fa-file-word fa-lg"></i>
                            @elseif(in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                            <i class="fas fa-file-image fa-lg"></i>
                        </a><br>
                        @endif
                        @endforeach
                    </div>
                </td>
                <td>
                    <span class="status
                            @if($claim->status === 'Menunggu') menunggu
                            @elseif($claim->status === 'Disetujui') disetujui
                            @elseif($claim->status === 'Ditolak') ditolak
                            @endif">
                        {{ $claim->status }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

    @endif

</div>

<script src="{{ asset('js/modal/index.js') }}"></script>
@include('user.modal.index')
@endsection