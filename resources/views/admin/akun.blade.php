@extends('layouts.sidebar_admin')

@section('title', 'Manajemen Akun')

@section('content')

<link rel="stylesheet" href="{{ asset('css/klaim/indexStyle.css') }}"> <!-- Tampilan Halaman -->
<link rel="stylesheet" href="{{ asset('css/modal/style.css') }}"> <!-- Modal View -->
<link rel="stylesheet" href="{{ asset('css/layout/alert.css') }}"> <!-- Notif Toast -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="container-1">
    <header>Manajemen Akun</header>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $pengguna)
            <tr>
                <td>{{ $pengguna->name }}</td>
                <td>{{ $pengguna->username }}</td>
                <td>{{ $pengguna->email }}</td>
                <td>{{ $pengguna->role }}</td>
                <td>
                    <span class="status 
                        @if ($pengguna->status == 'Aktif') aktif
                        @elseif ($pengguna->status == 'Tidak Aktif') tidak-aktif
                        @endif">
                        {{ $pengguna->status }}</td>
                    </span>
                <td>
                    <a href="#" method="POST" class="button-edit">
                        Edit
                    </a>
                    <form action="{{ route('admin.akun.delete', $pengguna->id) }}" method="POST" class="delete-akun">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="delete">
                            Delete
                        </button>
                    </form>
                    
                </td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
</div>

@endsection