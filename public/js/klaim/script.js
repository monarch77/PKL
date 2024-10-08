const form = document.querySelector('form'),
      nextBtn = document.querySelector('.nextBtn'),  // Perbaiki pemanggilan class
      backBtn = document.querySelector('.backBtn'),  // Perbaiki pemanggilan class
      allInput = form.querySelectorAll(".first input");  // Mengambil semua input di dalam div dengan class 'first'

nextBtn.addEventListener('click', () => {
    let allFilled = true;  // Flag untuk mengecek apakah semua input sudah terisi

    allInput.forEach(input => {
        if (input.value === "") {
            allFilled = false;  // Jika ada input yang kosong, flag diubah
        }
    });

    if (allFilled) {
        form.classList.add('secActive');  // Tambahkan class jika semua input terisi
    } else {
        form.classList.remove('secActive');  // Hapus class jika ada input yang kosong
        alert("Input is empty");
    }
});

backBtn.addEventListener('click', () => {
    form.classList.remove('secActive');  // Menghapus class secActive ketika tombol back diklik
});
