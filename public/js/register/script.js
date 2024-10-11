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
