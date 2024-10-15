@extends('layouts.sidebar_user')

@section('title', 'Klaim Saya')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/klaim/indexStyle.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container-1">
        <header>Daftar Klaim Asuransi</header>

        @if($claims->isEmpty())
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
                <tr>
                    <td>
                        <a href="#" class="show-claim-modal">{{ $claim->no_polis }}</a>
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
                            @if($claim->status === 'Menunggu') menunggu
                            @elseif($claim->status === 'Disetujui') disetujui
                            @elseif($claim->status === 'Ditolak') ditolak
                            @endif">
                            {{ $claim->status }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('klaim.edit', $claim->id) }}" class="edit">
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
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    
    <script src="{{ asset('js/alert.js') }}"></script>
</body>

</html>
@endsection