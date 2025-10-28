<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Funcionários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('stylefunci.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <img src="{{ asset('img/Lo1.png') }}" alt="Ícone" class="img-icon">
        <h1>Funcionários</h1>

        <form method="GET" action="{{ route('funcionarios.index') }}" class="form-inline">
            <input type="text" name="nome" placeholder="Nome" value="{{ request('nome') }}">
            <input type="text" name="email" placeholder="Email" value="{{ request('email') }}">
            <input type="text" name="cargo" placeholder="Cargo" value="{{ request('cargo') }}">
            <button type="submit">Filtrar</button>
            <a href="{{ route('funcionarios.index') }}"><button type="button">Limpar</button></a>
        </form>

        <div style="text-align: right; margin-bottom: 10px;">
            <a href="{{ route('funcionarios.create') }}">
                <button>+ Novo Funcionário</button>
            </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Cargo</th>
                    <th>Salário</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($funcionarios as $funcionario)
                    <tr>
                        <td>{{ $funcionario->id }}</td>
                        <td>{{ $funcionario->nome }}</td>
                        <td>{{ $funcionario->email }}</td>
                        <td>{{ $funcionario->cargo }}</td>
                        <td>{{ number_format($funcionario->salario, 2, ',', '.') }}</td>
                        <td class="actions">
                            <a href="{{ route('funcionarios.show', $funcionario->id) }}">
                                <button type="button">Ver</button>
                            </a>
                            <a href="{{ route('funcionarios.edit', $funcionario->id) }}">
                                <button type="button">Editar</button>
                            </a>
                            <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Nenhum funcionário encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>