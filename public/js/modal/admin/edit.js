document.addEventListener("DOMContentLoaded", function () {
    var modal = document.getElementById("editModal");
    var closeModalBtn = document.getElementById("close");
    var claimLinks = document.querySelectorAll(".edit-akun");

    claimLinks.forEach(function (link) {
        link.addEventListener("click", function (e) {
            e.preventDefault();

            document.querySelector("input[name='name']").value = '';
            document.querySelector("input[name='username']").value = '';
            document.querySelector("input[name='email']").value = '';
            document.querySelector("select[name='role']").value = '';
            document.querySelector("select[name='status']").value = '';

            var id = this.getAttribute("data-id");
            var name = this.getAttribute("data-nama");
            var username = this.getAttribute("data-username");
            var email = this.getAttribute("data-email");
            var role = this.getAttribute("data-role");
            var status = this.getAttribute("data-status");
            
            document.querySelector("input[name='name']").value = name;
            document.querySelector("input[name='username']").value = username;
            document.querySelector("input[name='email']").value = email;
            document.querySelector("select[name='role']").value = role;
            document.querySelector("select[name='status']").value = status;

            document.querySelector("form").action = '/akun/update/' + id;
            
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


