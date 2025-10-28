<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('frete.css') }}">
    <title>Cadastro de Frete</title>
</head>
<body>
    <img src="{{ asset('Img/Icon.png') }}" alt="Logo" class="logo">

    <section class="containerPai">
        <div class="card">
            <div class="FormCadastro">
                <h2>Cadastre seu Frete</h2>

                <!-- Formulário com o método POST e CSRF token -->
                <form method="POST" action="{{ route('cadastro.store') }}">
                    @csrf
                @if(session('success'))
                    <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                @endif

                    <input type="text" name="email_comerciante" placeholder="Email Comerciante" required>

                    <label class="modelo">Marcas Produtos:</label>
                    <select name="marca_produto">
                        <option value="">Selecione o modelo</option>
                        <option value="volvo">Carreto 2 eixos</option>
                        <option value="scania">Carreto 2 eixos</option>
                        <option value="mercedes">Cavalo Mecânico</option>
                    </select>

                    <input type="text" name="ano_fabricacao" placeholder="Ano de fabricação" id="anoInput" maxlength="4" required>
                    <input type="text" name="nome_motorista" placeholder="Nome do motorista" required>
                    <input type="tel" name="telefone" placeholder="Telefone">

                    <label class="tipo">Tipo de carga:</label>
                    <select name="tipo_carga">
                        <option value="">Selecione o tipo</option>
                        <option value="alimentícia">Alimentícia</option>
                        <option value="combustível">Combustível</option>
                        <option value="industrial">Industrial</option>
                    </select>

                    <input type="number" name="capacidade_carga" placeholder="Capacidade de carga (ton)" step="0.1">
                    <input type="text" name="observacoes" placeholder="Observações">

                    <button type="submit">Cadastrar caminhão</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>