<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>PDF de Teste</title>
</head>
<body>
    <h1>Relatório</h1>
    <p>Este é um PDF gerado com DomPDF no Laravel!</p>

    <ul>
        @foreach($usuarios as $user)
            <li>{{ $user->name }} - {{ $user->email }}</li>
        @endforeach
    </ul>
</body>
</html>
