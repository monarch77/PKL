<div class="modal" id="rejectModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Alasan Penolakan</h2>
            <span id="close">&times;</span>
        </div>
        <div class="modal-body">
            <form id="rejectKlaimForm" action="" method="POST">
                @csrf
                @method('PATCH')
                <textarea name="alasan_penolakan" placeholder="Masukkan Alasan Penolakan..." required></textarea>
                <button type="submit" class="buttons">Kirim</button>
            </form>
        </div>
    </div>
</div>