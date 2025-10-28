<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('stylef.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <img src="{{ asset('img/Lo1.png') }}" alt="Ícone" class="img-icon">

        <h2>Editar Funcionário</h2>

        <form action="{{ route('funcionarios.update', $funcionario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ $funcionario->nome }}" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $funcionario->email }}" required>

            <label for="cargo">Cargo:</label>
            <input type="text" id="cargo" name="cargo" value="{{ $funcionario->cargo }}" required>

            <label for="salario">Salário:</label>
            <input type="number" id="salario" name="salario" value="{{ $funcionario->salario }}" required>

            <button type="submit">Atualizar</button>
            <a href="{{ route('funcionarios.index') }}">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>