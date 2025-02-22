function triggerFileUpload() {
    document.getElementById('file-upload').click();
}

function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const profileImage = document.getElementById('profile-image');
        profileImage.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

 // Fungsi untuk mengaktifkan mode edit
 function enableEdit() {
    const inputs = document.querySelectorAll('.input-fields input');
    const inputsSelect = document.querySelectorAll('.input-fields select');
    const submitBtn = document.querySelector('.submitBtn');
    
    // Aktifkan semua input
    inputs.forEach(input => {
        if (input.name != 'role') {
            input.removeAttribute('readonly');
            input.classList.add('editable');
        }
    });

    inputsSelect.forEach(input => {
        input.removeAttribute('disabled');
        input.classList.add('editable');
    });

    // Ubah teks tombol menjadi Simpan
    submitBtn.innerHTML = '<span class="btnText">Simpan</span>';
    submitBtn.type = 'submit';
    submitBtn.onclick = saveProfile;
}

// Event listener untuk tombol Edit
document.querySelector('.submitBtn').addEventListener('click', function(event) {
    if (this.querySelector('.btnText').innerText === 'Edit') {
        event.preventDefault(); // Cegah submit form saat dalam mode Edit
        enableEdit();
    }
});