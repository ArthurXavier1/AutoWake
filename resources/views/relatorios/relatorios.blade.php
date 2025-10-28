<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Relatórios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            padding: 30px;
            background-image: url("{{ asset('Img/fundo.png') }}");
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

        input[type="text"], input[type="date"] {
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
        <img src="{{ asset('Img/Icon.png') }}" alt="Ícone" class="img-icon">

        {{-- Título --}}
        <h1>Relatórios de Caminhões</h1>

        {{-- FORMULÁRIO DE FILTRO --}}
        <form method="GET" action="{{ route('relatorios.index') }}" class="form-inline">
            <input type="text" name="motorista" placeholder="Motorista" value="{{ request('motorista') }}">
            <input type="text" name="placa" placeholder="Placa" value="{{ request('placa') }}">
            <input type="date" name="data" value="{{ request('data') }}">
            <button type="submit">Filtrar</button>
            <a href="{{ route('relatorios.index') }}"><button type="button">Limpar</button></a>
        </form>

        {{-- BOTÃO NOVO RELATÓRIO --}}
        <div style="text-align: right; margin-bottom: 10px;">
            <a href="{{ route('relatorios.create') }}">
                <button>+ Novo Relatório</button>
            </a>
        </div>

        {{-- LISTAGEM --}}
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Motorista</th>
                    <th>Placa</th>
                    <th>Data</th>
                    <th>Origem</th>
                    <th>Destino</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($relatorios as $relatorio)
                    <tr>
                        <td>{{ $relatorio->id }}</td>
                        <td>{{ $relatorio->motorista }}</td>
                        <td>{{ $relatorio->placa }}</td>
                        <td>{{ $relatorio->data }}</td>
                        <td>{{ $relatorio->origem }}</td>
                        <td>{{ $relatorio->destino }}</td>
                        <td class="actions">
                            {{-- Ver --}}
                            <a href="{{ route('relatorios.show', $relatorio->id) }}">
                                <button type="button">Ver</button>
                            </a>

                            {{-- Editar --}}
                            <a href="{{ route('relatorios.edit', $relatorio->id) }}">
                                <button type="button">Editar</button>
                            </a>

                            {{-- Deletar --}}
                            <form action="{{ route('relatorios.destroy', $relatorio->id) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Nenhum relatório encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>