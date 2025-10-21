<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Detalhes do Produto</title>
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
        h1 {
            color: #4eaff7;
            margin-bottom: 25px;
            text-align: center;
        }
        p {
            font-size: 18px;
            margin: 10px 0;
        }
        .btn {
            margin-top: 20px;
        }
        .img-icon {
            width: 150px;
            margin-bottom: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border-radius: 8px;
            object-fit: contain;
            max-height: 150px;
        }
        .btn-ver-caminhoneiros {
            background-color: #3a8bb1;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 10px 20px;
            cursor: pointer;
            display: block;
            margin: 20px auto 0;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
        }
        .btn-ver-caminhoneiros:hover {
            background-color: #2a6683;
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="container">
        <img src="{{ asset('img/Lo1.png') }}" alt="Ícone" class="img-icon">

        <h1>Detalhes do Produto</h1>

        @if($produto->imagem)
            <img src="{{ asset('img/' . $produto->imagem) }}" alt="Imagem do Produto" class="img-icon">
        @endif

        <p><strong>Nome:</strong> {{ $produto->nome }}</p>
        <p><strong>Descrição:</strong> {{ $produto->descricao }}</p>
        <p><strong>Categoria:</strong> {{ $produto->categoria }}</p>
        <p><strong>Peso:</strong> {{ $produto->peso }} kg</p>
        <p><strong>Local de Retirada:</strong> {{ $produto->local_retirada }}</p>
        <p><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
        <p><strong>Quantidade em estoque:</strong> {{ $produto->quantidade ?? 'Não informado' }}</p>

        <a href="{{ route('produtos.index') }}" class="btn btn-info">Voltar à lista</a>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
