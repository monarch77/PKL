<div class="modal" id="editModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Edit User: {{$pengguna->username}}</h2>
            <span id="close">&times;</span>
        </div>
        <div class="modal-body">
            <form id="editKlaimForm" action="{{ route('manager.akun.update', $pengguna->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <input type="hidden" name="id" value="">

                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" value="{{ $pengguna->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" value="{{ $pengguna->username }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ $pengguna->email }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select id="role" name="role" required>
                        <option value="{{ $pengguna->role }}">{{ $pengguna->role }}</option>
                        @if ($pengguna->role !== 'manager')
                        <option value="manager">manager</option>
                        @endif
                        @if ($pengguna->role !== 'nasabah')
                        <option value="nasabah">nasabah</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" required>
                        <option value="{{ $pengguna->status }}">{{ $pengguna->status }}</option>
                        @if ($pengguna->status !== 'Aktif')
                        <option value="Aktif">Aktif</option>
                        @endif
                        @if ($pengguna->status !== 'Tidak Aktif')
                        <option value="Tidak Aktif">Tidak Aktif</option>
                        @endif
                    </select>
                </div>

                <button type="submit" class="buttons">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>