function openRejectModal(id) {
    const modal = document.getElementById("rejectModal");
    const form = document.getElementById("rejectKlaimForm");

    form.action = `/admin/klaim/${id}/reject`;

    modal.style.display = "block";
}

window.onclick = function(event) {
    const modal = document.getElementById("rejectModal");

    if (event.target === modal) {
        modal.style.display = "none";
    }
};

document.getElementById('close').onclick = function() {
    document.getElementById("rejectModal").style.display = "none";
};