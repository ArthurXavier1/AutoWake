<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            padding: 30px;
            background-image: url("{{ asset('fundo.png') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            margin: 0;
            color: #dce0e6;
        }
        .container {
            background-color: rgba(31, 31, 32, 0.6);
            padding: 30px;
            border-radius: 12px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
        }
        h2 {
            color: #4eaff7;
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: none;
            border-radius: 6px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
            min-height: 80px;
        }
        button {
            margin-top: 20px;
            background-color: #4eaff7;
            color: white;
            cursor: pointer;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
        }
        a {
            margin-left: 15px;
            color: #4eaff7;
            text-decoration: none;
            font-weight: bold;
        }
        .img-icon {
            width: 100px;
            margin-bottom: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>

    <div class="container">
        <img src="{{ asset('img/Lo1.png') }}" alt="Ícone" class="img-icon">

        <h2>Editar Produto</h2>

        <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ $produto->nome }}" required>

            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao">{{ $produto->descricao }}</textarea>

            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" step="0.01" value="{{ $produto->preco }}" required>

            <label for="quantidade">Quantidade em estoque:</label>
            <input type="number" id="quantidade" name="quantidade" value="{{ $produto->quantidade }}" required>

            <button type="submit">Atualizar</button>
            <a href="{{ route('produtos.index') }}">Cancelar</a>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>