@if($user)
    <p>Olá, {{ $user->name }}!</p>

    <p>Seu código de verificação é: <strong>{{ $user->codigo }}</strong></p>

    <p>Para validar seu email, clique no link abaixo:</p>
    <a href="http://127.0.0.1:8000/validar_email/{{ $user->codigo }}">
        Validar meu e-mail
    </a>
@else
    <p>Usuário não encontrado.</p>
@endif

<br>
<p>Arthur Xavier</p>
