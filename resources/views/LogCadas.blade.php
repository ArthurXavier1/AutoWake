<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>AutoWake - Login e Cadastro</title>

<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Lexend:wght@100..900&display=swap" rel="stylesheet" />

<style>
  * {
    margin: 0; padding: 0; box-sizing: border-box; font-weight: 400;
  }
  body {
    color: white;
    font-family: "Nunito", sans-serif;
    background-color: #000000;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .containerPai {
    width: 80%;
    height: 90vh;
    background-image: url('img/uiuiu.png');
    background-size: cover;
    border-radius: 32px;
    padding: 32px 20px;
    display: flex;
    position: relative;
    overflow: hidden;
  }
  .card {
    display: flex;
    width: 100%;
    height: 100%;
  }
  .esquerda, .direita {
    width: 50%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: relative;
    z-index: 1;
  }
  img.logo {
    width: 35%;
    position: relative;
    top: -33%;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
  }
  .LoginActive .esquerda img.logo {
    opacity: 1;
    pointer-events: auto;
    transition-delay: 0.3s;
  }
  h2 {
    margin-bottom: 32px;
    font-size: 45px;
    text-align: center;
    font-weight: bold;
    font-family: "Lexend", sans-serif;
  }
  form {
    display: flex;
    flex-direction: column;
    gap: 16px;
    width: 400px;
  }
  input {
    padding: 12px 20px;
    border-radius: 12px;
    font-size: 16px;
    background-color: #414040;
    color: #dce0e6;
    border: none;
  }
  input::placeholder {
    color: rgba(255, 255, 255, 0.504);
  }
  button {
    padding: 12px 20px;
    border-radius: 12px;
    border: none;
    outline: none;
    font-size: 16px;
    margin-top: 8px;
    width: 100%;
    font-weight: 700;
    color: rgba(0, 0, 0, 0.8);
    cursor: pointer;
    transition: all 0.3s;
    background: linear-gradient(90deg, #2b4c7e 0%, #dce0e688 100%);
    border: 2px solid #2b4c7e;
  }
  button:hover {
    transform: translateY(-2px);
  }
  p, a {
    text-align: center;
    color: rgba(255, 255, 255, 0.58);
  }
  a {
    color: #2b4c7e;
    font-size: 14px;
    font-weight: bold;
    display: block;
    margin-top: -10px;
    margin-bottom: 16px;
    transition: color 0.5s ease;
  }
  a:hover {
    color: #dce0e6;
  }
  .forgot {
    margin-bottom: 8px;
  }

  /* Container Login / Cadastro (text + button) */
  .containerLogin, .containerCadastro {
    position: absolute;
    width: 50%;
    top: 50%;
    transform: translateY(-50%);
    text-align: center;
    color: #dce0e6b2;
    pointer-events: auto;
  }
  .containerLogin {
    left: 0;
    padding-left: 40px;
  }
  .containerCadastro {
    right: 0;
    padding-right: 40px;
  }
  .containerLogin button, .containerCadastro button {
    background-color: rgba(255, 255, 255, 0.34);
    border: 1px solid #dce0e69a;
    color: black;
    font-weight: 700;
    border-radius: 12px;
    padding: 12px 20px;
    cursor: pointer;
    width: 180px;
    margin: auto;
    margin-top: 20px;
    transition: background-color 0.3s ease;
  }
  .containerLogin button:hover, .containerCadastro button:hover {
    background-color: #2b4c7e;
    color: white;
  }

  /* Fade and transform toggles */
  .LoginActive .FormLogin {
    opacity: 1;
    pointer-events: auto;
    position: relative;
    transition: opacity 0.3s ease 0.3s;
  }
  .LoginActive .FormCadastro {
    opacity: 0;
    pointer-events: none;
    position: absolute;
  }
  .LoginActive .containerLogin {
    opacity: 0;
    pointer-events: none;
    transform: translateX(-200%);
    transition: opacity 0.3s ease 0s, transform 0.3s ease 0s;
  }
  .LoginActive .containerCadastro {
    opacity: 1;
    transform: translateX(0);
    transition: opacity 0.3s ease 0.3s, transform 0.3s ease 0.3s;
  }

  .CadastroActive .FormLogin {
    opacity: 0;
    pointer-events: none;
    position: absolute;
  }
  .CadastroActive .FormCadastro {
    opacity: 1;
    pointer-events: auto;
    position: relative;
    transition: opacity 0.3s ease 0.3s;
  }
  .CadastroActive .containerLogin {
    opacity: 1;
    transform: translateX(0);
    pointer-events: auto;
    transition: opacity 0.3s ease 0.3s, transform 0.3s ease 0.3s;
  }
  .CadastroActive .containerCadastro {
    opacity: 0;
    pointer-events: none;
    transform: translateX(200%);
    transition: opacity 0.3s ease 0s, transform 0.3s ease 0s;
  }

  /* Background overlay */
  .card::after {
    content: "";
    position: absolute;
    top: 0; right: 0;
    width: 100%; height: 100%;
    background-image: url('uiuiu.png');
    background-size: cover;
    background-position: center;
    filter: brightness(75%);
    z-index: 0;
    transition: transform 0.5s ease;
  }
  .LoginActive .card::after {
    transform: translateX(50%);
  }
  .CadastroActive .card::after {
    transform: translateX(-50%);
  }
</style>
</head>
<body>

<section class="containerPai">
  <div class="card LoginActive" id="card">
    <div class="esquerda">
      <img src="img/Logotipo.png" alt="Logo" class="logo" />
      <div class="FormLogin">
        <h2>Fazer Login</h2>
        <form id="loginForm" autocomplete="off">
          <input type="text" id="loginEmail" placeholder="E-mail" required />
          <input type="password" id="loginPassword" placeholder="Senha" required />
          <div class="forgot">
            <a href="#">Esqueceu a senha? sem problemas!</a>
          </div>
          <button type="submit">Entrar</button>
          <p id="loginResult" style="color: red; font-size: 14px;"></p>
        </form>
      </div>
      <div class="containerLogin">
        <h2>Já tem <br />uma conta?</h2>
        <p>Mantenha sua frota conectada e protegida 24 horas por dia com a tecnologia AutoWake.</p>
        <button class="loginbutton">Faça login</button>
      </div>
    </div>
    <div class="direita">
      <div class="FormCadastro">
        <h2>Cadastro</h2>
        <form id="cadastroForm" autocomplete="off">
          <input type="text" id="name" placeholder="Nome" required />
          <input type="email" id="registerEmail" placeholder="E-mail" required />
          <input type="password" id="registerPassword" placeholder="Senha" required />
          <input type="password" id="registerConfirmPassword" placeholder="Confirme a sua senha" required />
          <button type="submit">Cadastrar</button>
          <p id="result" style="color: red; font-size: 14px;"></p>
        </form>
      </div>
      <div class="containerCadastro">
        <h2>Não tem <br />uma conta?</h2>
        <p>Mantenha sua frota conectada e protegida 24 horas por dia com a tecnologia AutoWake.</p>
        <button class="cadasbutton">Cadastra-se</button>
      </div>
    </div>
  </div>
</section>

<script>
  // Função para enviar dados via fetch
  async function postData(url = '', data = {}) {
    const response = await fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        // Se precisar, adicione token CSRF aqui:
        // 'X-CSRF-TOKEN': 'TOKEN_AQUI'
      },
      body: JSON.stringify(data),
      credentials: 'same-origin' // para cookies/session
    });
    const respData = await response.json();
    return { status: response.status, data: respData };
  }

  // Toggle entre Login e Cadastro
  const card = document.getElementById('card');
  const loginBtn = document.querySelector('.loginbutton');
  const cadasBtn = document.querySelector('.cadasbutton');

  loginBtn.addEventListener('click', () => {
    card.classList.remove('CadastroActive');
    card.classList.add('LoginActive');
  });

  cadasBtn.addEventListener('click', () => {
    card.classList.remove('LoginActive');
    card.classList.add('CadastroActive');
  });

  // Formulários e resultados
  const loginForm = document.getElementById('loginForm');
  const cadastroForm = document.getElementById('cadastrofrom'); // corrigido para mesmo id do seu form
  const loginResult = document.getElementById('loginResult');
  const cadastroResult = document.getElementById('registerResult');

  // Cadastro
  cadastroForm.addEventListener('submit', async function(e) {
    e.preventDefault();
    cadastroResult.style.color = 'red';
    cadastroResult.textContent = '';

    const name = cadastroForm.name.value.trim();
    const email = cadastroForm.registerEmail.value.trim();
    const password = cadastroForm.registerPassword.value;
    const confirmPassword = cadastroForm.registerConfirmPassword.value;

    if(!name || !email || !password || !confirmPassword){
      cadastroResult.textContent = 'Por favor, preencha todos os campos.';
      return;
    }
    if(password !== confirmPassword){
      cadastroResult.textContent = 'As senhas não coincidem.';
      return;
    }

    // Chama API de cadastro
    const { status, data } = await postData('/register', { name, email, password });

    if(status === 200 || status === 201){
      cadastroResult.style.color = 'green';
      cadastroResult.textContent = data.message || 'Cadastro realizado com sucesso!';
      cadastroForm.reset();
    } else {
      if(data.errors){
        cadastroResult.textContent = Object.values(data.errors).flat().join(' ');
      } else {
        cadastroResult.textContent = data.message || 'Erro ao cadastrar';
      }
    }
  });

  // Login
  loginForm.addEventListener('submit', async function(e) {
    e.preventDefault();
    loginResult.style.color = 'red';
    loginResult.textContent = '';

    const email = loginForm.loginEmail.value.trim();
    const password = loginForm.loginPassword.value;

    if(!email || !password){
      loginResult.textContent = 'Por favor, preencha todos os campos.';
      return;
    }

    // Chama API de login
    const { status, data } = await postData('/login', { email, password });

    if(status === 200){
      loginResult.style.color = 'green';
      loginResult.textContent = 'Login realizado com sucesso!';
      console.log('Token:', data.access_token);
      // Exemplo: salvar token localmente
      // localStorage.setItem('token', data.access_token);
    } else {
      loginResult.textContent = data.message || 'Erro no login';
    }
  });
</script>

</body>
</html>