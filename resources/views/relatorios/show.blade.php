<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <title>Detalhes do Relatórios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            padding: 30px;
            background-image: url("{{ asset('fundo.png') }}");
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
            text-align: center;
        }
        h1 {
            color: #4eaff7;
            margin-bottom: 25px;
        }
        p {
            font-size: 1.1rem;
        }
        a.btn {
            margin-left: 15px;
            color: #fff;
            font-weight: bold;
        }
        a.btn:hover {
            text-decoration: underline;
            color: #cce5ff;
        }
        .img-icon {
            width: 100px;
            margin-bottom: 20px;
        }
        /* Botão animado */
        .dl-parachute {
            position: relative;
            width: 160px;
            height: 160px;
            margin: 30px auto 40px auto;
            cursor: pointer;
            user-select: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #4eaff7;
            font-weight: 600;
            font-family: Arial, sans-serif;
            transition: color 0.3s ease;
        }
        .dl-parachute:hover {
            color: #66c2ff;
        }
        .circle {
            position: absolute;
            top: 0; left: 0;
            width: 160px;
            height: 160px;
            transform: rotate(-90deg);
            transition: stroke-dashoffset 0.4s ease;
        }
        .circle circle {
            stroke-dasharray: 345;
            stroke-dashoffset: 345;
            transition: stroke-dashoffset 0.4s ease;
        }
        .parachute-icon {
            z-index: 1;
            animation: float 3s ease-in-out infinite;
        }
        .check-icon {
            display: none;
            animation: fadeIn 0.5s ease-in-out forwards;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }
        #progress-text {
            margin-top: 12px;
            font-size: 1.1rem;
            user-select: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('img/Lo1.png') }}" alt="Ícone" class="img-icon" />
        <h1>Detalhes do Relatório</h1>
        <p><strong>Motorista:</strong> {{ $relatorio->motorista }}</p>
        <p><strong>Data:</strong> {{ $relatorio->data }}</p>
        <p><strong>Placa:</strong> {{ $relatorio->placa }}</p>
        <p><strong>Origem:</strong> {{ $relatorio->origem }}</p>
        <p><strong>Destino:</strong> {{ $relatorio->destino }}</p>
        <p><strong>Quilometragem:</strong> {{ $relatorio->km }} km</p>
        <p><strong>Tempo:</strong> {{ $relatorio->tempo }}</p>
        <p><strong>Consumo de combustível:</strong> {{ $relatorio->combustivel }}</p>
        <p><strong>Paradas:</strong> {{ $relatorio->paradas }}</p>
        <p><strong>Eventos:</strong> {{ $relatorio->eventos }}</p>
        <p><strong>Ocorrências:</strong> {{ $relatorio->ocorrencias }}</p>

        <!-- Botão animado para baixar PDF -->
        <div class="dl-parachute" id="baixarPdf" role="button" tabindex="0" aria-label="Baixar Relatório em PDF">
          <svg class="circle" viewBox="0 0 120 120" aria-hidden="true">
            <circle cx="60" cy="60" r="55" stroke="#4eaff7" stroke-width="4" fill="transparent" />
          </svg>
          <div class="parachute-icon" id="truck-icon" aria-hidden="true">
            <!-- Ícone de caminhão -->
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="#4eaff7">
              <path d="M20 8h-3V4H3v13h2a3 3 0 006 0h2a3 3 0 006 0h2v-7l-3-2zm-3-2v2H5V6h12zM7 17a1 1 0 11-2 0 1 1 0 012 0zm8 0a1 1 0 11-2 0 1 1 0 012 0zm3-2a3.001 3.001 0 00-5.829 0H9.829A3.001 3.001 0 004 15V8h13v7z"/>
            </svg>
          </div>
          <div class="check-icon" id="check-icon" aria-hidden="true">
            <!-- Ícone de check -->
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#28a745" viewBox="0 0 24 24">
              <path d="M20.285 6.708l-11.285 11.292-5.285-5.292 1.42-1.416 3.865 3.872 9.865-9.876z"/>
            </svg>
          </div>
          <span id="progress-text">Clique para Baixar</span>
        </div>

        <a href="{{ route('relatorios.index') }}" class="btn btn-info">Voltar à lista</a>
    </div>

    <!-- ... (todo o restante do HTML que você já tem) -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
  const { jsPDF } = window.jspdf;

  const botao = document.getElementById('baixarPdf');
  const circle = botao.querySelector('circle');
  const progressText = document.getElementById('progress-text');
  const truckIcon = document.getElementById('truck-icon');
  const checkIcon = document.getElementById('check-icon');
  const circumference = 345;

  let animando = false;

  botao.addEventListener('click', () => {
    if (animando) return;
    animando = true;

    let progress = 0;
    progressText.textContent = 'Iniciando...';
    truckIcon.style.display = 'block';
    checkIcon.style.display = 'none';

    const interval = setInterval(() => {
      progress += 5;
      if (progress > 100) progress = 100;

      const offset = circumference - (progress / 100) * circumference;
      circle.style.strokeDashoffset = offset;

      progressText.textContent = progress < 100 ? `${progress}%` : '100% ✔️';

      if (progress === 100) {
        clearInterval(interval);

       const doc = new jsPDF();

doc.setFillColor(0, 0, 0); 
doc.rect(0, 0, 210, 297, 'F'); 
const logo = '{{ asset("img/Lo1.png") }}';


try {
  doc.addImage(logo, 'PNG', 15, 10, 30, 25);
} catch (e) {}

doc.setFont("times", "bold");
doc.setFontSize(22);
doc.setTextColor(255, 255, 255);
doc.text("Relatório de Viagem", 105, 30, { align: "center" });

doc.setFontSize(13);
doc.setTextColor(255, 255, 255);
doc.text("Detalhes do trajeto e desempenho do motorista", 105, 38, { align: "center" });

doc.setDrawColor(100, 100, 100);
doc.line(20, 42, 190, 42);

doc.setFillColor(31, 31, 32);  // Cor do fundo do quadro #1f1f20
doc.roundedRect(15, 50, 180, 175, 3, 3, 'F');

doc.setFont("times", "normal");
doc.setFontSize(18);

const dados = [
  ["Motorista:", "{{ $relatorio->motorista }}"],
  ["Data:", "{{ $relatorio->data }}"],
  ["Placa:", "{{ $relatorio->placa }}"],
  ["Origem:", "{{ $relatorio->origem }}"],
  ["Destino:", "{{ $relatorio->destino }}"],
  ["Quilometragem:", "{{ $relatorio->km }} km"],
  ["Tempo:", "{{ $relatorio->tempo }}"],
  ["Combustível:", "{{ $relatorio->combustivel }}"],
  ["Paradas:", "{{ $relatorio->paradas }}"],
  ["Eventos:", "{{ $relatorio->eventos }}"],
  ["Ocorrências:", "{{ $relatorio->ocorrencias }}"]
];

let y = 62;
dados.forEach(([label, valor]) => {
  doc.setFont("times", "normal");
  doc.setTextColor(255, 255, 255);  // Cor das letras em branco
  doc.text(label, 20, y);

  doc.setFont("times", "bold");
  doc.setTextColor(255, 255, 255);  // Cor das letras em branco
  doc.text(valor, 65, y);

  y += 16;
});

doc.setDrawColor(220);
doc.line(15, 270, 195, 270);

doc.setFontSize(10);
doc.setFont("times", "italic");
doc.setTextColor(0, 0, 0);
doc.text("Relatório gerado automaticamente via sistema.", 15, 280);
doc.text("www.seusite.com", 195, 280, { align: "right" });

const nomeArquivo = 'relatorio_motorista_{{ Str::slug($relatorio->motorista) }}.pdf';
doc.save(nomeArquivo);


        truckIcon.style.display = 'none';
        checkIcon.style.display = 'block';

        setTimeout(() => {
          progressText.textContent = 'Clique para Baixar';
          circle.style.strokeDashoffset = circumference;
          checkIcon.style.display = 'none';
          truckIcon.style.display = 'block';
          animando = false;
        }, 2500);
      }
    }, 100);
  });
</script>

</body>
</html>