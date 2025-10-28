<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script> 
  <link rel="stylesheet" href="Editar_Perfil.css">
  <title>Editar Perfil</title>

</head>
<body>

  <div class="edit-container">

    <label class="profile-pic">
      <input type="file" id="fileInput" accept="image/*">
      <img id="preview" alt="foto de perfil">
      <svg id="defaultIcon" xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="white" viewBox="0 0 16 16">
        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
        <path fill-rule="evenodd" d="M14 14s-1-1.5-6-1.5S2 14 2 14s1-6 6-6 6 6 6 6z"/>
      </svg>
    </label>

    <small id="fotoHint">Clique na foto para trocar</small>
    <div id="formularioEdicao">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" placeholder="Digite seu nome">
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" placeholder="Digite seu email">
      </div>

      <div class="buttons">
        <button onclick="salvar()">Salvar</button>
        <button onclick="cancelar()">Cancelar</button>
      </div>
    </div>
  </div>
  
  <script src="Editar.js"></script>
</body>
</html>

