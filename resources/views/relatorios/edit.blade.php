<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar Relatório</title>
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
        input[type="date"],
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
        <img src="{{ asset('Img/Icon.png') }}" alt="Ícone" class="img-icon">

        <h2>Editar Relatório</h2>

        <form action="{{ route('relatorios.update', $relatorio->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="motorista">Motorista:</label>
            <input type="text" id="motorista" name="motorista" value="{{ $relatorio->motorista }}" required>

            <label for="data">Data:</label>
            <input type="date" id="data" name="data" value="{{ $relatorio->data }}" required>

            <label for="placa">Placa:</label>
            <input type="text" id="placa" name="placa" value="{{ $relatorio->placa }}" required>

            <label for="origem">Origem:</label>
            <input type="text" id="origem" name="origem" value="{{ $relatorio->origem }}" required>

            <label for="destino">Destino:</label>
            <input type="text" id="destino" name="destino" value="{{ $relatorio->destino }}" required>

            <label for="km">Quilometragem:</label>
            <input type="number" id="km" name="km" value="{{ $relatorio->km }}" required>

            <label for="tempo">Tempo de Viagem:</label>
            <input type="text" id="tempo" name="tempo" value="{{ $relatorio->tempo }}" required>

            <label for="combustivel">Combustível:</label>
            <input type="text" id="combustivel" name="combustivel" value="{{ $relatorio->combustivel }}" required>

            <label for="paradas">Paradas:</label>
            <input type="text" id="paradas" name="paradas" value="{{ $relatorio->paradas }}" required>

            <label for="eventos">Eventos Críticos:</label>
            <textarea id="eventos" name="eventos">{{ $relatorio->eventos }}</textarea>

            <label for="ocorrencias">Ocorrências:</label>
            <textarea id="ocorrencias" name="ocorrencias">{{ $relatorio->ocorrencias }}</textarea>

            <button type="submit">Atualizar</button>
            <a href="{{ route('relatorios.index') }}">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
