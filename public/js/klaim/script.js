//button next & back
const form = document.querySelector('form'),
      nextBtn = document.querySelector('.nextBtn'),  
      backBtn = document.querySelector('.backBtn'),  
      allInput = form.querySelectorAll(".first input");  

nextBtn.addEventListener('click', () => {
    let allFilled = true;  

    allInput.forEach(input => {
        if (input.value === "") {
            allFilled = false;  
        }
    });

    if (allFilled) {
        form.classList.add('secActive');  
    } else {
        form.classList.remove('secActive');  
    }
});

backBtn.addEventListener('click', () => {
    form.classList.remove('secActive');  
});

//script rp dan pemisah ribuan
const nominalInput = document.getElementById('nominal-klaim');

nominalInput.addEventListener('focus', function() {
    if (!nominalInput.value.startsWith('Rp.')) {
        nominalInput.value = 'Rp. ' + nominalInput.value;
    }
});

nominalInput.addEventListener('input', function(e) {
    let value = e.target.value.replace(/[^\d]/g, ''); 

    if (!nominalInput.value.startsWith('Rp.')) {
        nominalInput.value = 'Rp. ' + formatRibuan(value);
    } else {
        nominalInput.value = 'Rp. ' + formatRibuan(value);
    }
});

function formatRibuan(value) {
    return value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
}



