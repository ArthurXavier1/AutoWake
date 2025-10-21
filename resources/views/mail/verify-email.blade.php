<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Confirmação de Código</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url(fundo.png);
            padding: 20px;
            color: #2c3e50;
        }
        .container {
            max-width: 480px;
            margin: auto;
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            text-align: center;
        }
        .code {
            font-size: 28px;
            font-weight: 700;
            background-color: #4e5f70;
            color: #fff;
            padding: 15px 25px;
            border-radius: 8px;
            letter-spacing: 4px;
            margin: 20px 0;
            display: inline-block;
        }
        a.btn {
            display: inline-block;
            background-color: #2b4c7e;
            color: #fff;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 8px;
            margin-top: 20px;
        }
        a.btn:hover {
            background-color: #1e3560;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Olá, {{ $user->name }}!</h2>
        <p>Obrigado por se cadastrar no nosso site.</p>
        <p>Seu código de verificação é:</p>
        <div class="code">{{ $user->codigo }}</div>
        <p>Para confirmar seu cadastro, <a class="btn" href="{{ url('/confirmacao-email?email=' . urlencode($user->email)) }}">clique aqui</a> e insira o código no formulário.</p>
        <p style="font-size: 12px; color: #999; margin-top: 40px;">&copy; 2025 SeuSite. Todos os direitos reservados.</p>
    </div>
</body>
</html>