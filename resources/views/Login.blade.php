<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>AutoWake</title>
</head>
<body>
    <section class="containerPai">
        <div class="card LoginActive">
            <div class="esquerda">
                <div class="FormLogin">
                    <img src="img/Logotipo.png">
                    <h2>Fazer Login</h2>
                    <form>
                        <input type="text" placeholder="E-mail">
                        <input type="password" placeholder="Senha">
                        <button type="submit">Entrar</button>
                    </form>
                </div>
                <div class="containerLogin">
                    <h2>Já tem </br>uma conta?</h2>
                    <p>Lorem Ipsum has been the indurtry's standard dummy text ever since the 1500s</p>
                    <button class="loginbutton">Faça login</button>
                </div>
            </div>
             <div class="direita">
                <div class="FormCadastro">
                    <h2>Cadastro</h2>
                    <form>
                        <input type="text" placeholder="Nome">
                        <input type="email" placeholder="E-mail">
                        <input type="password" placeholder="Senha">
                        <input type="password" placeholder="Confirme a sua senha">
                        <button type="submit">Cadastrar</button>
                    </form>
                </div>
                <div class="containerCadastro">
                    <h2>Não tem </br>uma conta?</h2>
                    <p>Lorem Ipsum has been the indurtry's standard dummy text ever since the 1500s</p>
                    <button class="cadasbutton">Cadastra-se</button>
                </div>
            </div>
        </div>
    </section>

    <script>
        $('#loginForm').on('submit', function(e) {
            e.preventDefault();

            const email = $('#email').val();
            const password = $('#password').val();

            $.ajax({
                url: 'http://localhost:8000/api/login', // certifique-se de que este endpoint está correto
                method: 'POST',
                contentType: 'application/json',
                dataType: 'json',
                data: JSON.stringify({ email, password }),
                success: function(response) {
                    if (response.access_token) {
                        console.log('Token:', response.access_token); // Token exibido no console
                        $('#result').css('color', 'green').text('Login realizado com sucesso!');
                    } else {
                        $('#result').text('Token não encontrado na resposta.');
                    }
                },
                error: function(xhr) {
                    const msg = xhr.responseJSON?.message || 'Erro desconhecido ao fazer login.';
                    $('#result').css('color', 'red').text('Erro: ' + msg);
                }
            });
        });

        $('#cadastroForm').on('submit', function(e) {
            e.preventDefault();
            let name = $('#name').val();
            let email = $('#email').val();
            let password = $('#password').val();

            $.ajax({
                url: '/api/register',
                method: 'POST',
                contentType: 'application/json',
                dataType: 'json',
                data: JSON.stringify({ name, email, password }),
                success: function(response) {
                    $('#result').text('Cadastro realizado com sucesso!');
                },
                error: function(xhr) {
                    let msg = xhr.responseJSON?.message || 'Erro ao cadastrar.';
                    $('#result').text(msg);
                }
            });
        });
    </script>
</body>
</html>