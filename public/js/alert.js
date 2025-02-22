// alert add klaim
document.addEventListener("DOMContentLoaded", function () {
    var addKlaimForm = document.getElementById("klaimForm");

    if (addKlaimForm) {
        addKlaimForm.addEventListener("submit", function (e) {
            e.preventDefault();

            Swal.fire({
                title: "Berhasil",
                text: "Klaim berhasil diajukan.",
                icon: "success",
                confirmButtonText: "OK",
            }).then(() => {
                this.submit();
            });
        });
    }
});

//alert setujui klaim
document.addEventListener("DOMContentLoaded", function () {
    var deleteForms = document.querySelectorAll(".delete-form");

    deleteForms.forEach(function (form) {
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            Swal.fire({
                title: "Konfirmasi",
                text: "Apakah Anda yakin ingin menyetujui klaim ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Berhasil",
                        text: "Klaim berhasil dihapus",
                        icon: "success",
                    });
                    form.submit();
                }
            });
        });
    });
});

// alert hapus klaim
document.addEventListener("DOMContentLoaded", function () {
    var deleteForms = document.querySelectorAll(".delete-form");

    deleteForms.forEach(function (form) {
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            Swal.fire({
                title: "Konfirmasi",
                text: "Apakah Anda yakin ingin menghapus klaim ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Berhasil",
                        text: "Klaim berhasil dihapus",
                        icon: "success",
                    });
                    form.submit();
                }
            });
        });
    });
});

// alert hapus akun
document.addEventListener("DOMContentLoaded", function () {
    var deleteForms = document.querySelectorAll(".delete-akun");

    deleteForms.forEach(function (form) {
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            Swal.fire({
                title: "Konfirmasi",
                text: "Apakah Anda yakin ingin menghapus akun ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Berhasil",
                        text: "Akun berhasil dihapus",
                        icon: "success",
                    });
                    form.submit();
                }
            });
        });
    });
});

//alert edit profil
function saveProfile() {
    Swal.fire({
        title: "Berhasil",
        text: "Profil berhasil diperbarui.",
        icon: "success",
        confirmButtonText: "OK",
    }).then(() => {
        form.submit();
    });
}

//alert update password
document.addEventListener("DOMContentLoaded", function () {
    var updatePasswordForm = document.getElementById("changePasswordForm");

    if (updatePasswordForm) {
        updatePasswordForm.addEventListener("submit", function (e) {
            e.preventDefault();

            Swal.fire({
                title: "Berhasil",
                text: "Password berhasil diperbarui.",
                icon: "success",
                confirmButtonText: "OK",
            }).then(() => {
                this.submit();
            });
        });
    }
});

// alert logout
document.addEventListener("DOMContentLoaded", function () {
    var logoutLink = document.querySelector(".logout-link");

    if (logoutLink) {
        logoutLink.addEventListener("click", function (e) {
            e.preventDefault();

            Swal.fire({
                text: "Apakah Anda yakin ingin LogOut?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = logoutLink.getAttribute("href");
                }
            });
        });
    }
});
