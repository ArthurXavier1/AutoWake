<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Confirmar Código de Verificação</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #1a1d23;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #2b2f38;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        input {
            width: 100%;
            padding: 15px;
            font-size: 18px;
            border-radius: 8px;
            border: none;
            margin-bottom: 20px;
            text-align: center;
        }
        button {
            background-color: #2b4c7e;
            color: white;
            padding: 15px;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #1e3560;
        }
        .message {
            margin-top: 20px;
            font-size: 16px;
            color: #ff4747;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Confirme seu código</h2>
        <input type="text" id="codigo" placeholder="Digite o código recebido" maxlength="6" />
        <button onclick="validarCodigo()">Confirmar</button>
        <div id="mensagem" class="message"></div>
    </div>

    <script>
        // Pega o email do query string
        const params = new URLSearchParams(window.location.search);
const email = params.get('email');
const nome = params.get('nome'); // pega o nome também

function validarCodigo() {
    const codigo = document.getElementById('codigo').value.trim();
    const mensagem = document.getElementById('mensagem');
    mensagem.textContent = '';
    if (!codigo) {
        mensagem.textContent = 'Por favor, insira o código.';
        return;
    }
    fetch('/api/confirmacao/validar', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({ email, nome, codigo }) // envia nome junto
    })
    .then(res => res.json())
    .then(data => {
        if(data.status === 'sucesso') {
            mensagem.style.color = '#4caf50';
            mensagem.textContent = data.mensagem;
            setTimeout(() => {
                window.location.href = '/perfil';
            }, 1500);
        } else {
            mensagem.style.color = '#ff4747';
            mensagem.textContent = data.mensagem || 'Código inválido.';
        }
    })
    .catch(() => {
        mensagem.style.color = '#ff4747';
        mensagem.textContent = 'Erro ao validar código. Tente novamente.';
    });
}
    </script>
</body>
</html>