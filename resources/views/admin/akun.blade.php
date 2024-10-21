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
                        {{ $pengguna->status }}
                </td>
                </span>
                <td>
                    <a href="{{ route('admin.akun.edit', $pengguna->id) }}" class="edit"
                        data-nama="{{ $pengguna->name }}"
                        data-username="{{ $pengguna->username }}"
                        data-email="{{ $pengguna->email }}"
                        data-role="{{ $pengguna->role }}"
                        data-status="{{ $pengguna->status }}">

                        Edit
                    </a>
                    <form action="{{ route('admin.akun.delete', $pengguna->id) }}" method="POST" class="delete-akun">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="delete-button">
                            Delete
                        </button>
                    </form>

                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>

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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('js/alert.js') }}"></script>
<script src="{{ asset('js/modal/admin/edit.js') }}"></script>


@include('admin.modal.edit')
@endsection