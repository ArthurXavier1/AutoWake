<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="estiloss.css">
    <title>AutoWake | principal</title>
    <link rel="icon" href="img/Icon.png" type="image/x-icon">
</head>
<body>

    <div class="sidebar" id="sidebar">
        <div class="toggle-btn" id="toggleBtn"></div>
        <img src="img/escudo.png" alt="Logo" class="logo">

        <a class="" href="#">
            <i class="bi bi-house-door-fill"></i>
            <span class="link-text">Inicial</span>
        </a>

        <a href="{{ route('exibe_meu_perfil') }}">
            <i class="bi bi-person-circle"></i>
            <span class="link-text">Perfil</span>
        </a>

        <a href="{{ route('exibe_todas_as_telas') }}">
            <i class="bi bi-wrench-adjustable"></i>
            <span class="link-text">Tabelas</span>
        </a>    
           
        <a href="{{ route('exibe_DashboardAuto') }}">
            <i class="bi bi-clipboard2-data"></i></i>
            <span class="link-text">Dashboard</span>
        </a>    

        <a class="" href="#">
            <i class="bi bi-chat-dots-fill"></i>
            <span class="link-text">Chat</span>
        </a>
    </div>

    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="img/imagemdoiss.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Bem vindo(a)!</h5>
                    <p>AutoWake: inovação que move você.</p>
                </div>
            </div>

            <div class="carousel-item" data-bs-interval="2000">
                <img src="img/imagemtress.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Tecnologia Que Move Sua Frota</h5>
                    <p>Tecnologia que desperta segurança nas estradas.</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="img/imagemquatroos.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Segurança e Controle</h5>
                    <p>Sua frota sempre no caminho certo.</p>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section class="hero">
        <p>Nosso foco é <span id="animated-text">Inovação</span></p>
    </section>

    <div class="card-aviso">
        <h2>📢 Avisos Recentes</h2>
        <ul>
            <li><span>🔧</span> Revisão do sistema programada para 05/10.</li>
            <li><span>⚡</span> Novas atualizações de desempenho disponíveis.</li>
            <li><span>🚀</span> Teste de integração marcado para sexta-feira.</li>
        </ul>
    </div>

    <div class="card-atividade">
        <h3>⚡ Atividades Recentes</h3>
        <ul>
            <li>Novo veículo cadastrado: Ford Ranger.</li>
            <li>Relatório de desempenho exportado.</li>
            <li>Configuração de alertas atualizada.</li>
        </ul>
    </div>

    <div class="card-ranking">
        <h3>🏆 Ranking de Motoristas</h3>
        <ol>
            <li><span>1º</span> Carlos Andrade — 95 pts</li>
            <li><span>2º</span> Fernanda Lima — 89 pts</li>
            <li><span>3º</span> João Silva — 85 pts</li>
            <li>4º Marina Costa — 80 pts</li>
            <li>5º Pedro Santos — 78 pts</li>
        </ol>
    </div>

    <div class="dashboard">
        <div class="col-esquerda">
            <div class="card-destaques">
                <h3>✨ Seus Destaques</h3>
                <ul>
                    <li>Melhor desempenho de setembro</li>
                    <li>Tempo de resposta 20% mais rápido</li>
                    <li>Meta de viagens concluída ✅</li>
                </ul>
            </div>
        </div>

        <div class="col-direita">
            <div class="card-combustivel">
                <h3>⛽ Cotação de Combustível</h3>
                <table>
                    <tr>
                        <td>Gasolina Comum</td>
                        <td>R$ 6,79</td>
                    </tr>
                     <tr>
                        <td>Gasolina Aditivada</td>
                        <td>R$ 6,33</td>
                    </tr>
                    <tr>
                        <td>Etanol</td>
                        <td>R$ 4,13</td>
                    </tr>
                    <tr>
                        <td>Diesel</td>
                        <td>R$ 6,24</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="oo">
        <img src="img/1.png">
    </div>

</body>
</html>

    <footer>
        <div class="footer-waves">
            <img src="/img/wave.svg" alt="Ondas decorativas">
        </div>
    </footer>

    <ul id="particles-container"></ul>
    <script src="sidebar.js"></script>
    <script src="style.js"></script>
</body>
</html>
