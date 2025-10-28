<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detalhes do Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('styleshow.css') }}" rel="stylesheet" />
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .card {
            background-color: rgba(31, 31, 32, 0.6);
            color: white;
            border-radius: 10px;
        }
        strong.text {
            font-weight: 700;
            color: #4eaff7;
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
        #progress-text-funcionario {
            margin-top: 12px;
            font-size: 1.1rem;
            user-select: none;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .check-icon {
            display: none;
            animation: fadeIn 0.5s ease-in-out forwards;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
    <!-- jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <img src="{{ asset('img/Lo1.png') }}" alt="Ícone" class="img-fluid mb-4 mx-auto d-block" style="width: 100px;" />
        <h1 class="text-center text-primary mb-4">Detalhes do Funcionário</h1>

        <div class="card p-4 shadow-sm">
            <div class="mb-3">
                <strong class="text">Nome:</strong>
                <p>{{ $funcionario->nome }}</p>
            </div>
            <div class="mb-3">
                <strong class="text">Email:</strong>
                <p>{{ $funcionario->email }}</p>
            </div>
            <div class="mb-3">
                <strong class="text">Cargo:</strong>
                <p>{{ $funcionario->cargo }}</p>
            </div>
            <div class="mb-3">
                <strong class="text">Salário:</strong>
                <p>R$ {{ number_format($funcionario->salario, 2, ',', '.') }}</p>
            </div>

            <!-- Botão animado para baixar PDF -->
            <div class="dl-parachute" id="baixarPdfFuncionario" role="button" tabindex="0" aria-label="Baixar Relatório do Funcionário em PDF">
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
              <span id="progress-text-funcionario">Clique para Baixar</span>
            </div>

            <a href="{{ route('funcionarios.index') }}" class="btn btn-info d-block mx-auto mt-3" style="width: 160px;">Voltar à lista</a>
        </div>
    </div>

    <script>
  const { jsPDF } = window.jspdf;

  const botaoFunc = document.getElementById('baixarPdfFuncionario');
  const circleFunc = botaoFunc.querySelector('circle');
  const progressTextFunc = document.getElementById('progress-text-funcionario');
  const truckIcon = document.getElementById('truck-icon');
  const checkIcon = document.getElementById('check-icon');

  const circumferenceFunc = 345;
  let animandoFunc = false;

  botaoFunc.addEventListener('click', () => {
    if (animandoFunc) return;
    animandoFunc = true;

    let progress = 0;
    progressTextFunc.textContent = 'Iniciando...';
    truckIcon.style.display = 'block';
    checkIcon.style.display = 'none';

    const interval = setInterval(() => {
      progress += 5;
      if (progress > 100) progress = 100;

      const offset = circumferenceFunc - (progress / 100) * circumferenceFunc;
      circleFunc.style.strokeDashoffset = offset;

      progressTextFunc.textContent = progress < 100 ? `${progress}%` : '100%';

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
doc.text("Relatório do Funcionário", 105, 30, { align: "center" });

doc.setFontSize(13);
doc.setTextColor(255, 255, 255);
doc.text("Informações detalhadas do colaborador", 105, 38, { align: "center" });

doc.setDrawColor(100, 100, 100);
doc.line(20, 42, 190, 42);

doc.setFillColor(31, 31, 32);
doc.roundedRect(15, 50, 180, 80, 3, 3, 'F');

doc.setFont("times", "normal");
doc.setFontSize(16);

const dados = [
  ["Nome:", "{{ $funcionario->nome }}"],
  ["Email:", "{{ $funcionario->email }}"],
  ["Cargo:", "{{ $funcionario->cargo }}"],
  ["Salário:", "R$ {{ number_format($funcionario->salario, 2, ',', '.') }}"]
];

let y = 65;

dados.forEach(([label, valor]) => {
  doc.setFont("times", "normal");
  doc.setTextColor(255, 255, 255);
  doc.text(label, 20, y);

  doc.setFont("times", "bold");
  doc.setTextColor(255, 255, 255);
  doc.text(valor, 60, y);

  y += 20;
});

doc.setDrawColor(220);
doc.line(15, 270, 195, 270);

doc.setFontSize(10);
doc.setFont("times", "italic");
doc.setTextColor(0, 0, 0);
doc.text("Relatório gerado automaticamente via sistema.", 15, 280);
doc.text("www.seusite.com", 195, 280, { align: "right" });

const nomeArquivo = 'relatorio_funcionario_{{ Str::slug($funcionario->nome) }}.pdf';

doc.save(nomeArquivo);


        // Mostra check
        truckIcon.style.display = 'none';
        checkIcon.style.display = 'block';
        progressTextFunc.textContent = 'Concluído ✔️';

        setTimeout(() => {
          progressTextFunc.textContent = 'Clique para Baixar';
          circleFunc.style.strokeDashoffset = circumferenceFunc;
          truckIcon.style.display = 'block';
          checkIcon.style.display = 'none';
          animandoFunc = false;
        }, 2500);
      }
    }, 100);
  });
</script>
</body>
</html>