//alert hapus klaim
document.addEventListener('DOMContentLoaded', function() {
    var deleteForms = document.querySelectorAll('.delete-form');

    deleteForms.forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            if (confirm('Apakah Anda yakin ingin menghapus klaim ini?')) {
                form.submit();
            }
        });
    });
});

//alert logout
document.addEventListener('DOMContentLoaded', function() {
    var logoutLink = document.querySelector('.logout-link');

    if (logoutLink) {
        logoutLink.addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Apakah Anda yakin ingin LogOut?')) {
                window.location.href = logoutLink.getAttribute('href');
            }
        });
    }
});