document.addEventListener("DOMContentLoaded", function () {
    var modal = document.getElementById("claimModal");
    var closeModalBtn = document.getElementById("closeModal");
    var claimLinks = document.querySelectorAll(".show-claim-modal");

    claimLinks.forEach(function (link) {
        link.addEventListener("click", function (e) {
            e.preventDefault();

            var polis = this.getAttribute("data-polis");
            var nama = this.getAttribute("data-nama");
            var tanggal_lahir = this.getAttribute("data-tanggal-lahir");
            var no_hp = this.getAttribute("data-no-hp");
            var gender = this.getAttribute("data-gender");
            var pekerjaan = this.getAttribute("data-pekerjaan");
            var id_type = this.getAttribute("data-id-type");
            var id_number = this.getAttribute("data-id-number");
            var issued_date = this.getAttribute("data-issued-date");
            var issued_authority = this.getAttribute("data-issued-authority");
            var expired_date = this.getAttribute("data-expired-date");
            var address_type = this.getAttribute("data-address-type");
            var provinsi = this.getAttribute("data-provinsi");
            var kota_kabupaten = this.getAttribute("data-kota-kabupaten");
            var kecamatan_kelurahan = this.getAttribute("data-kecamatan-kelurahan");
            var rt_rw = this.getAttribute("data-rt-rw");
            var kode_pos = this.getAttribute("data-kode-pos");
            var claim_type = this.getAttribute("data-claim-type");
            var tanggal_kejadian = this.getAttribute("data-tanggal-kejadian");
            var nominal_claim = this.getAttribute("data-nominal");
            var deskripsi = this.getAttribute("data-deskripsi");

            document.getElementById("modal-no-polis").innerText = polis;
            document.getElementById("modal-nama").innerText = nama;
            document.getElementById("modal-tanggal-lahir").innerText = tanggal_lahir;
            document.getElementById("modal-no-hp").innerText = no_hp;
            document.getElementById("modal-gender").innerText = gender;
            document.getElementById("modal-pekerjaan").innerText = pekerjaan;
            document.getElementById("modal-id-type").innerText = id_type;
            document.getElementById("modal-id-number").innerText = id_number;
            document.getElementById("modal-issued-date").innerText = issued_date;
            document.getElementById("modal-issued-authority").innerText = issued_authority;
            document.getElementById("modal-expired-date").innerText = expired_date;
            document.getElementById("modal-address-type").innerText = address_type;
            document.getElementById("modal-provinsi").innerText = provinsi;
            document.getElementById("modal-kota-kabupaten").innerText = kota_kabupaten;
            document.getElementById("modal-kecamatan-kelurahan").innerText = kecamatan_kelurahan;
            document.getElementById("modal-rt-rw").innerText = rt_rw;
            document.getElementById("modal-kode-pos").innerText = kode_pos;
            document.getElementById("modal-claim-type").innerText = claim_type;
            document.getElementById("modal-tanggal-kejadian").innerText = tanggal_kejadian;
            document.getElementById("modal-nominal-klaim").innerText = nominal_claim;
            document.getElementById("modal-deskripsi").innerText = deskripsi;

            modal.style.display = "block";
        });
    });

    closeModalBtn.addEventListener("click", function () {
        modal.style.display = "none";
    });

    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});
