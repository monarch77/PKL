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

document.querySelector('.submitBtn').addEventListener('click', function(event) {
    const fileUpload = document.getElementById('file-upload');
    if (!fileUpload.files.length) {
        event.preventDefault(); 
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Harap unggah foto profil sebelum mengirim form!',
        });
    }
});
