  
   $(document).ready(function () {
    const nome = localStorage.getItem('perfil_nome');
    const email = localStorage.getItem('perfil_email');
    const imagem = localStorage.getItem('perfil_img');

    if (nome) {
      $('.profile_info h2').text(nome);
    }

    if (email) {
      $('.profile_info p').first().text(email); // Atualiza o primeiro <p> com o e-mail
    }

    if (imagem) {
      $('.profile img').attr('src', imagem);
    }
  });
  
  const tabButtons = document.querySelectorAll(".tab-btn");
  const tabContents = document.querySelectorAll(".tab-content");

  tabButtons.forEach(button => {
    button.addEventListener("click", () => {
    
    tabButtons.forEach(btn => btn.classList.remove("active"));
    tabContents.forEach(content => content.classList.remove("active"));

    button.classList.add("active");
    document.getElementById(button.dataset.tab).classList.add("active");
});
});
  const themeSel = document.getElementById("themeSel");

  function applyTheme(theme) {
  document.body.classList.remove("light", "dark");
  if (theme === "light") {
  document.body.classList.add("light");
  } else if (theme === "dark") {
  document.body.classList.add("dark");
  } else {
    if (window.matchMedia("(prefers-color-scheme: light)").matches) {
  document.body.classList.add("light");
  } else {
  document.body.classList.add("dark");
  }
  }
  }

  themeSel.addEventListener("change", () => {
    const theme = themeSel.value;
    localStorage.setItem("theme", theme);
    applyTheme(theme);
  });

  applyTheme(localStorage.getItem("theme") || "auto");
  themeSel.value = localStorage.getItem("theme") || "auto";
