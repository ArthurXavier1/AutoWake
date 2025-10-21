<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Produtos (Peças de Caminhão)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            padding: 30px;
            background-image: url("{{ asset('fundo.png') }}");
            height: 100vh;
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
            max-width: 1000px;
            margin: auto;
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
            margin-top: 5%;
        }

        h1 {
            color: #4eaff7;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #2b2b2b;
            margin-top: 20px;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #444;
            text-align: left;
        }

        table th {
            background-color: #3b3b3b;
            color: #ffffff;
        }

        input, select, button {
            padding: 8px;
            margin: 5px;
            border: none;
            border-radius: 6px;
        }

        input[type="text"] {
            width: 180px;
        }

        button {
            background-color: #4eaff7;
            color: white;
            cursor: pointer;
        }

        .form-inline {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        .actions form {
            display: inline;
        }

        .img-icon {
            width: 100px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        {{-- Ícone --}}
        <img src="{{ asset('img/Lo1.png') }}" alt="Ícone" class="img-icon">

        {{-- Título --}}
        <h1>Peças de Caminhão</h1>

        {{-- Formulário de Filtro --}}
        <form method="GET" action="{{ route('produtos.index') }}" class="form-inline">
            <input type="text" name="nome" placeholder="Nome da peça" value="{{ request('nome') }}">
            <input type="text" name="categoria" placeholder="Categoria" value="{{ request('categoria') }}">
            <button type="submit">Filtrar</button>
            <a href="{{ route('produtos.index') }}">
                <button type="button">Limpar</button>
            </a>
        </form>

        {{-- Botão Novo Produto --}}
        <div style="text-align: right; margin-bottom: 10px;">
            <a href="{{ route('produtos.create') }}">
                <button>+ Novo Produto</button>
            </a>
        </div>

        {{-- Tabela de Produtos --}}
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Peso</th>
                    <th>Local de Retirada</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->categoria }}</td>
                        <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                        <td>{{ $produto->peso }} kg</td>
                        <td>{{ $produto->local_retirada }}</td>
                        <td class="actions">
                            {{-- Ver --}}
                            <a href="{{ route('produtos.show', $produto->id) }}">
                                <button type="button">Ver</button>
                            </a>

                            {{-- Editar --}}
                            <a href="{{ route('produtos.edit', $produto->id) }}">
                                <button type="button">Editar</button>
                            </a>

                            {{-- Deletar --}}
                            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" onsubmit="return confirm('Deseja excluir este produto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Nenhum produto encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>