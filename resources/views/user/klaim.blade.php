@extends('layouts.sidebar_user')

@section('title', 'Klaim Saya')

@section('content')

<link rel="stylesheet" href="{{ asset('css/klaim/indexStyle.css') }}"> <!-- Tampilan Klaim -->
<link rel="stylesheet" href="{{ asset('css/modal/style.css') }}"> <!-- Modal View -->
<link rel="stylesheet" href="{{ asset('css/layout/alert.css') }}"> <!-- Notif Toast -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="container-1">
    <header>Daftar Klaim Asuransi</header>

    @if($claims->filter(function($claim) {
    return $claim->status === 'Menunggu';
    })->isEmpty())
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
            @foreach($claims as $claim)
            @if($claim->status === 'Menunggu')
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
                <td>{{ $claim->name }}</td>
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
                        @if($claim->status === 'Menunggu')
                            @if (Auth::user()->role === 'Admin') menunggu
                            @else diproses
                            @endif 
                        @elseif($claim->status === 'Disetujui') disetujui
                        @elseif($claim->status === 'Ditolak') ditolak
                        @endif">
                        @if($claim->status === 'Menunggu')
                        @if(Auth::user()->role === 'admin')
                        {{ $claim->status }}
                        @else
                        Diproses
                        @endif
                        @else
                        {{ $claim->status }}
                        @endif
                    </span>
                </td>
                <td>
                    <a href="{{ route('klaim.edit', $claim->id) }}" class="edit"
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
                        data-nominal="{{ $claim->nominal_claim }}"
                        data-deskripsi="{{ $claim->deskripsi_kejadian }}">
                        <i class="fas fa-pen-to-square fa-lg"></i>

                    </a>
                    <form action="{{ route('klaim.destroy', $claim->id) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="delete">
                            <i class="fas fa-trash fa-lg"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    @include('user.modal.edit')
    @endif
</div>

<div class="container-1 riwayat-klaim">
    <header>Riwayat Pengajuan Klaim</header>
    @if($claims->filter(function($claim) {
    return in_array($claim->status, ['Disetujui', 'Ditolak']);
    })->isEmpty())
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
            @foreach($claims as $claim)
            @if(in_array($claim->status, ['Disetujui', 'Ditolak']))
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
                        data-deskripsi="{{ $claim->deskripsi_kejadian }}"
                        data-alasan="{{ $claim->alasan_penolakan }}"
                        data-status="{{ $claim->status }}">
                        {{ $claim->no_polis }}
                    </a>
                </td>
                <td>{{ $claim->name }}</td>
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
                            @elseif(in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                            <i class="fas fa-file-image fa-lg"></i>
                            @endif
                        </a><br>
                        @endforeach
                    </div>
                </td>
                <td>
                    <span class="status 
                            @if($claim->status === 'Disetujui') disetujui
                            @elseif($claim->status === 'Ditolak') ditolak
                            @endif">
                        {{ $claim->status }}
                    </span>
                </td>
                <td>
                    <!-- <a href="{{ route('klaim.edit', $claim->id) }}" class="edit">
                        <i class="fas fa-pen-to-square fa-lg"></i>
                    </a> -->
                    <form action="{{ route('klaim.destroy', $claim->id) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete">
                            <i class="fas fa-trash fa-lg"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    @endif


</div>

@if (session('edit_success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            customClass: {
                popup: 'custom-toast toast-edit'
            },
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });

        Toast.fire({
            icon: 'success',
            title: '{{ session("edit_success") }}'
        });
    });
</script>
@endif
@if (session('delete_success'))
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
            title: '{{ session("delete_success") }}',
            customClass: {
                popup: 'custom-toast toast-delete'
            }
        });
    });
</script>
@endif


<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('js/alert.js') }}"></script>
<script src="{{ asset('js/modal/edit.js') }}"></script>

@include('user.modal.index')
@endsection