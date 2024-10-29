//view modal
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
            var nominal_claim = this.getAttribute("data-nominal-claim");
            var deskripsi = this.getAttribute("data-deskripsi");
            var alasan = this.getAttribute("data-alasan");
            var status = this.getAttribute("data-status");

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

            if (status === "Ditolak") {
                document.getElementById("modal-alasan-text").innerText = alasan;
                document.getElementById("modal-alasan").style.display = "block";
            } else {
                document.getElementById("modal-alasan").style.display = "none";
            }

            modal.style.display = "block";
        });
    });

    function closeModalWithAnimation() {
        modal.classList.add("fade-out");
        setTimeout(() => {
            modal.style.display = "none";
            modal.classList.remove("fade-out");
        }, 300);
    }

    closeModalBtn.addEventListener("click", closeModalWithAnimation);

    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            closeModalWithAnimation();
        }
    });
});

//download klaim ke xls
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('download-claim').addEventListener('click', function () {
        var noPolis = document.getElementById('modal-no-polis').innerText;
        var claimData = {
            "No Polis": noPolis,
            "Nama": document.getElementById('modal-nama').innerText,
            "Tanggal Lahir": document.getElementById('modal-tanggal-lahir').innerText,
            "No HP": document.getElementById('modal-no-hp').innerText,
            "Jenis Kelamin": document.getElementById('modal-gender').innerText,
            "Pekerjaan": document.getElementById('modal-pekerjaan').innerText,
            "ID Type": document.getElementById('modal-id-type').innerText,
            "ID Number": document.getElementById('modal-id-number').innerText,
            "Issued Date": document.getElementById('modal-issued-date').innerText,
            "Issued Authority": document.getElementById('modal-issued-authority').innerText,
            "Expired Date": document.getElementById('modal-expired-date').innerText,
            "Address Type": document.getElementById('modal-address-type').innerText,
            "Provinsi": document.getElementById('modal-provinsi').innerText,
            "Kota/Kabupaten": document.getElementById('modal-kota-kabupaten').innerText,
            "Kecamatan/Kelurahan": document.getElementById('modal-kecamatan-kelurahan').innerText,
            "RT/RW": document.getElementById('modal-rt-rw').innerText,
            "Kode Pos": document.getElementById('modal-kode-pos').innerText,
            "Jenis Klaim": document.getElementById('modal-claim-type').innerText,
            "Tanggal Kejadian": document.getElementById('modal-tanggal-kejadian').innerText,
            "Nominal Klaim": document.getElementById('modal-nominal-klaim').innerText,
            "Deskripsi Kejadian": document.getElementById('modal-deskripsi').innerText
        };
        var wb = XLSX.utils.book_new();  
        var ws = XLSX.utils.json_to_sheet([claimData]);  
        var fileName = "Klaim - " + noPolis + ".xlsx";
        
        XLSX.utils.book_append_sheet(wb, ws, "Klaim Data");
        
        XLSX.writeFile(wb, fileName);
    });
});

