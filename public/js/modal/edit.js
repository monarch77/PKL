document.addEventListener("DOMContentLoaded", function () {
    var modal = document.getElementById("editModal");
    var closeModalBtn = document.getElementById("close");
    var claimLinks = document.querySelectorAll(".edit");

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

            document.querySelector("input[name='no_polis']").value = polis;
            document.querySelector("input[name='name']").value = nama;
            document.querySelector("input[name='tanggal_lahir']").value = tanggal_lahir;
            document.querySelector("input[name='no_hp']").value = no_hp;
            document.querySelector("select[name='gender']").value = gender;
            document.querySelector("input[name='pekerjaan']").value = pekerjaan;
            document.querySelector("select[name='id_type']").value = id_type;
            document.querySelector("input[name='id_number']").value = id_number;
            document.querySelector("input[name='issued_date']").value = issued_date;
            document.querySelector("input[name='issued_authority']").value = issued_authority;
            document.querySelector("input[name='expired_date']").value = expired_date;
            document.querySelector("select[name='address_type']").value = address_type;
            document.querySelector("input[name='provinsi']").value = provinsi;
            document.querySelector("input[name='kota_kabupaten']").value = kota_kabupaten;
            document.querySelector("input[name='kecamatan_kelurahan']").value = kecamatan_kelurahan;
            document.querySelector("input[name='rt_rw']").value = rt_rw;
            document.querySelector("input[name='kode_pos']").value = kode_pos;
            document.querySelector("select[name='claim_type']").value = claim_type;
            document.querySelector("input[name='tanggal_kejadian']").value = tanggal_kejadian;
            document.querySelector("input[name='nominal_claim']").value = nominal_claim;
            document.querySelector("textarea[name='deskripsi_kejadian']").value = deskripsi;

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


