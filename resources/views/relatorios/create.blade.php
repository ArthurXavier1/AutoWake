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
    {{-- Ícone --}}
    <img src="{{ asset('Img/Icon.png') }}" alt="Ícone" class="img-icon">

    <div class="container">
        <h2>Novo Relatório</h2>

        <form action="{{ route('relatorios.store') }}" method="POST">
            @csrf

            <label>Motorista:</label>
            <input type="text" name="motorista" required>

            <label>Data:</label>
            <input type="date" name="data" required>

            <label>Placa:</label>
            <input type="text" name="placa" required>

            <label>Origem:</label>
            <input type="text" name="origem" required>

            <label>Destino:</label>
            <input type="text" name="destino" required>

            <label>Quilometragem:</label>
            <input type="number" name="km" required>

            <label>Tempo de Viagem:</label>
            <input type="text" name="tempo" required>

            <label>Combustível:</label>
            <input type="text" name="combustivel" required>

            <label>Paradas:</label>
            <input type="text" name="paradas" required>

            <label>Eventos Críticos:</label>
            <textarea name="eventos"></textarea>

            <label>Ocorrências:</label>
            <textarea name="ocorrencias"></textarea>

            <button type="submit">Salvar</button>
            <a href="{{ route('relatorios.index') }}">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>