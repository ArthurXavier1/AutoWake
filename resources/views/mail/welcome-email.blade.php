<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Confirmação de Código</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', Arial, sans-serif;
            background: url('http://localhost:8000/img/fundo.png') no-repeat center center fixed;
            background-size: cover;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 80px auto;
            background-color: rgba(255, 255, 255, 0.96);
            padding: 40px 30px;
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
            border: 1px solid #ddd;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .img-icon {
            width: 90px;
            margin-bottom: 20px;
        }

        .site-name {
            font-size: 28px;
            color: #0073e6;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .greeting {
            font-size: 18px;
            color: #444;
            margin-bottom: 30px;
            line-height: 1.5;
        }

        .code {
            font-size: 24px;
            font-weight: bold;
            background-color: #0073e6;
            color: #fff;
            padding: 15px 25px;
            border-radius: 10px;
            display: inline-block;
            letter-spacing: 2px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 115, 230, 0.3);
        }

        .footer {
            font-size: 13px;
            color: #888;
        }

        /* Responsividade */
        @media (max-width: 600px) {
            .container {
                margin: 40px 20px;
                padding: 30px 20px;
            }

            .site-name {
                font-size: 24px;
            }

            .code {
                font-size: 20px;
                padding: 12px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="http://localhost:8000/img/Icon.png" alt="Ícone" class="img-icon">
        <div class="site-name">Bem-Vindo ao AutoWake</div>
        <div class="greeting">
            Olá, {{ $user->name }}!<br>
            Obrigado por se cadastrar no nosso site.
        </div>
        <div class="code">
            Seu código de verificação: <strong>{{ $user->codigo }}</strong>
        </div>
        <div class="footer">
            &copy; 2025 AutoWake. Todos os direitos reservados.
        </div>
    </div>
</body>
</html>