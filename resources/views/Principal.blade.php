<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="icon" href="img/Icon.png" type="image/x-icon">
    <link rel="stylesheet" href="Principal.css">
    <title>telainicial.com.br</title>
</head>
<body>

    <header>
        <nav>
        <a href="#historia">Nossa história</a>
        <a href="#missao">Missão e deveres</a>
        <a href="#oque-fazemos">O que fazemos</a>
        <a href="#diferenciais">Nossos diferenciais</a>
        <a href="#contato">Contato</a>
        </nav>
    </header>

    <div class="hero">
    <div class="overlay"></div>
    <div class="hero-content">
        <img src="img/Logotipo.png" alt="Logotipo">
        <p class="subtitle"><b>TECNOLOGIA PARA SEGURANÇA</b></p>
        <p>Monitoramento inteligente, resposta rápida e visibilidade total</p>
        <button id="btn-saiba-mais">Saiba mais</button>
    </div>
</div>

    <section id="historia" class="sobre">
        <img src="img/fundo1.png" class="ngc1">
        <h2>Nossa história</h2>
        <p>A <b>AutoWake</b> nasceu com o propósito de transformar a segurança nas estradas brasileiras. </br>Observando as dificuldades enfrentadas por caminhoneiros e empresas de transporte, </br>desenvolvemos uma solução tecnológica confiável, capaz de oferecer </br>monitoramento em tempo real, prevenção de riscos e tranquilidade </br>para quem transporta e para quem espera a carga. </br>Desde o início, nossa jornada é guiada pela inovação e pelo compromisso em proteger vidas.</p>
        <img src="img/1.png" class="ngc">
    </section>

    <section id="missao" class="missao">
        <h2>Missão e deveres</h2>
        <p>Nossa missão é garantir segurança, confiança e eficiência </br>no transporte rodoviário. Temos o dever de proteger motoristas, </br>cargas e empresas, oferecendo tecnologia de ponta e suporte </br>humano em cada etapa da viagem.</p>

    <div class="carousel-container">
  <button class="carousel-btn prev-btn">&#10094;</button>
  
  <div class="carousel">
    <div class="card" style="background-image: url(img/2.jpg); background-size: cover; background-position: center;">
      <div class="overlay"></div>
      <p>Segurança em primeiro lugar: Monitoramento inteligente para reduzir riscos e evitar imprevistos.</p>
    </div>

    <div class="card" style="background-image: url(img/3.jpg); background-size: cover; background-position: center;">
      <div class="overlay"></div>
      <p>Compromisso com o caminhoneiro: Valorizamos e apoiamos quem move o Brasil nas estradas.</p>
    </div>

    <div class="card" style="background-image: url(img/4.jpg); background-size: cover; background-position: center;">
      <div class="overlay"></div>
      <p>Responsabilidade social: Trabalhamos para construir um trânsito mais seguro e consciente.</p>
    </div>
  </div>
  
  <button class="carousel-btn next-btn">&#10095;</button>
</div>

    </section>

    <section id="oque-fazemos" class="fazer">
        <h2>O que fazemos</h2>
        <p>A <b>AutoWake</b> atua no monitoramento completo de caminhões, motoristas e cargas. </br>Nossa plataforma identifica trajetos, condições de transporte e situações de emergência, permitindo resposta rápida </br>em caso de acidentes ou irregularidades. Trabalhamos para que cada viagem seja mais segura, transparente e confiável.</p>
    </section>

    <section id="diferenciais" class="diferenca">
        <h2>Nossos diferenciais</h2>
        <p>O <b>AutoWake</b> não é apenas uma ferramenta de monitoramento: </br>somos parceiros estratégicos no transporte. Nossa tecnologia foi </br>criada para unir eficiência, inovação e proximidade </br>com os motoristas e empresas.</p>
    
    
        <div class="cards-container">
        <div class="card-item">
         <img class="card-image" src="img/5.jpg" alt="Imagem 1">
        <div class="card-text">
         <h3>Tecnologia em tempo real</h3>
         <p>Acompanhamento constante e relatórios precisos.</p>
        </div>
    </div>

    <div class="card-item">
      <img class="card-image" src="img/6.jpg" alt="Imagem 2">
      <div class="card-text">
        <h3>Atendimento humanizado</h3>
        <p>Suporte ágil e especializado sempre disponível.</p>
      </div>
    </div>

    <div class="card-item">
      <img class="card-image" src="img/7.jpg" alt="Imagem 3">
      <div class="card-text">
        <h3>Soluções personalizadas</h3>
        <p>Sistemas adaptados às necessidades de cada cliente.</p>
      </div>
    </div>
  </div>
    </section>

    <footer class="footer-contato" id="contato">
  <div class="footer-container">
    <img src="img/Icon.png" class="lg">
    <div class="footer-info">
      <h3>Fale Conosco</h3>
      <p>Email: <a href="mailto:contato@autowake.com">contato@autowake.com</a></p>
      <p>Telefone: <a href="tel:+5511999999999">(11) 99999-9999</a></p>
      <div class="footer-redes">
        <a href="#">Facebook</a> | 
        <a href="#">Instagram</a> | 
        <a href="#">LinkedIn</a>
      </div>
    </div>

    <div class="footer-buttons">
     <a href="{{ route('exibe_cadastros', ['mode' => 'login']) }}" class="btn-login">Login</a>
    <a href="{{ route('exibe_cadastros', ['mode' => 'cadastro']) }}" class="btn-cadastro">Cadastro</a>

    </div>
  </div>
  <script src="Principal.js"></script>
</footer>

</body>
</html>