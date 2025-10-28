const fileInput = document.getElementById('fileInput');
const preview = document.getElementById('preview');
const fotoHint = document.getElementById('fotoHint');
const defaultIcon = document.getElementById('defaultIcon');
const formulario = document.getElementById('formularioEdicao');

// Exibir imagem selecionada
fileInput.addEventListener('change', function () {
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      preview.src = e.target.result;
      preview.style.display = "block";
      fotoHint.style.display = "none";
      defaultIcon.style.display = "none";
    };
    reader.readAsDataURL(file);
  }
});

// Cancelar edição
function cancelar() {
  formulario.style.display = "none";
  document.getElementById('nome').value = "";
  document.getElementById('email').value = "";
}

function salvar() {
  const nome = document.getElementById('nome').value;
  const email = document.getElementById('email').value;
  const file = document.getElementById('fileInput').files[0];

  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      // Salva tudo no localStorage
      localStorage.setItem('perfil_nome', nome);
      localStorage.setItem('perfil_email', email);
      localStorage.setItem('perfil_img', e.target.result);

      alert("Perfil atualizado com sucesso!");
      window.location.href = "http://127.0.0.1:8000/Perfil";
    };
    reader.readAsDataURL(file);
  } else {
    // Se imagem não foi alterada
    localStorage.setItem('perfil_nome', nome);
    localStorage.setItem('perfil_email', email);

    alert("Perfil atualizado com sucesso!");
    window.location.href = "http://127.0.0.1:8000/Perfil";
  }
}

window.onload = function () {
    const nome = localStorage.getItem('perfil_nome');
    const email = localStorage.getItem('perfil_email');
    const imagem = localStorage.getItem('perfil_img');

    if (nome) document.getElementById('nome').value = nome;
    if (email) document.getElementById('email').value = email;
    if (imagem) {
      document.getElementById('preview').src = imagem;
      document.getElementById('preview').style.display = "block";
      document.getElementById('fotoHint').style.display = "none";
      document.getElementById('defaultIcon').style.display = "none";
    }
  };
