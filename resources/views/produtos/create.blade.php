<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Novo Produto</title>
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
        input, textarea, button {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: none;
            border-radius: 6px;
        }
        button {
            background-color: #4eaff7;
            color: white;
            cursor: pointer;
        }
        a {
            color: #fff;
            text-decoration: none;
            margin-left: 10px;
        }
        .img-icon {
            width: 100px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <img src="{{ asset('img/Lo1.png') }}" alt="Ícone" class="img-icon">

    <div class="container">
        <h2>Novo Produto</h2>

        <form action="{{ route('produtos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Nome:</label>
    <input type="text" name="nome" required>

    <label>Descrição:</label>
    <textarea name="descricao" rows="3"></textarea>

    <label>Preço:</label>
    <input type="number" name="preco" step="0.01" required>

    <label>Quantidade em estoque:</label>
    <input type="number" name="quantidade_estoque" required>

    <label>Categoria:</label>
    <input type="text" name="categoria" required>

    <label>Peso (kg):</label>
    <input type="number" name="peso" step="0.01">

    <label>Local de retirada:</label>
    <input type="text" name="local_retirada">

    <label>Imagem da peça:</label>
    <input type="file" name="imagem" accept="image/*">

    <button type="submit">Salvar</button>
    <a href="{{ route('produtos.index') }}">Cancelar</a>
</form>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>