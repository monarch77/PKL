<div id="claimModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Informasi Klaim</h2>
            <span id="closeModal">&times;</span>
        </div>
        <div class="modal-body">
            <p><strong>No Polis:</strong> <span id="modal-no-polis"></span></p>
            <p><strong>Nama:</strong> <span id="modal-nama"></span></p>
            <p><strong>Tanggal Lahir:</strong> <span id="modal-tanggal-lahir"></span></p>
            <p><strong>No HP:</strong> <span id="modal-no-hp"></span></p>
            <p><strong>Jenis Kelamin:</strong> <span id="modal-gender"></span></p>
            <p><strong>Pekerjaan:</strong> <span id="modal-pekerjaan"></span></p>
            <p><strong>ID Type:</strong> <span id="modal-id-type"></span></p>
            <p><strong>ID Number:</strong> <span id="modal-id-number"></span></p>
            <p><strong>Issued Date:</strong> <span id="modal-issued-date"></span></p>
            <p><strong>Issued Authority:</strong> <span id="modal-issued-authority"></span></p>
            <p><strong>Expired Date:</strong> <span id="modal-expired-date"></span></p>
            <p><strong>Address Type:</strong> <span id="modal-address-type"></span></p>
            <p><strong>Provinsi:</strong> <span id="modal-provinsi"></span></p>
            <p><strong>Kota/Kabupaten:</strong> <span id="modal-kota-kabupaten"></span></p>
            <p><strong>Kecamatan/Kelurahan:</strong> <span id="modal-kecamatan-kelurahan"></span></p>
            <p><strong>RT/RW:</strong> <span id="modal-rt-rw"></span></p>
            <p><strong>Kode Pos:</strong> <span id="modal-kode-pos"></span></p>
            <p><strong>Jenis Klaim:</strong> <span id="modal-claim-type"></span></p>
            <p><strong>Tanggal Kejadian:</strong> <span id="modal-tanggal-kejadian"></span></p>
            <p><strong>Nominal Klaim:</strong> <span id="modal-nominal-klaim"></span></p>
            <p><strong>Deskripsi Kejadian:</strong> <span id="modal-deskripsi"></span></p>
            <p id="modal-alasan" style="display: none;"><strong>Alasan Penolakan:</strong> <span id="modal-alasan-text"></span></p>
        </div>
        <div class="modal-footer">
            <button id="download-claim" class="buttons">
                <i class="fas fa-file-excel fa-lg"></i>
                Download as XLS
            </button>
        </div>
    </div>
</div>
<script src="{{ asset('js/modal/index.js') }}"></script>