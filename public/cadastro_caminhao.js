const anoInput = document.getElementById('anoInput');

anoInput.addEventListener('input', () => {
    // remove tudo que não seja número
    anoInput.value = anoInput.value.replace(/\D/g, '');
});