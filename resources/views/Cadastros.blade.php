<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>
    <link rel="icon" href="img/Icon.png" type="image/x-icon">
    <link rel="stylesheet" href="login_cadastro.css">
    <title>cadastrousuario.com.br</title>
</head>
<body>
    <section class="containerPai">
        <div class="card LoginActive">
            <div class="esquerda">
                <img src="img/Logotipo.png" alt="Logo">
                <div class="FormLogin">
                    <h2>Fazer Login</h2>
                    <form id="loginForm">
                        <input type="text" id="loginEmail" placeholder="E-mail">
                        <input type="password" id="loginPassword" placeholder="Senha">
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
                    <form id="cadastroForm">
                        <input type="text" id="name" placeholder="Nome">
                        <input type="email" id="registerEmail" placeholder="E-mail">
                        <input type="password" id="registerPassword" placeholder="Senha">
                        <input type="password" id="registerConfirmPassword" placeholder="Confirme a sua senha">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/cadastros.js"></script>
</body>
</html>
