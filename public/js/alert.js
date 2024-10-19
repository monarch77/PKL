//alert hapus klaim
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
