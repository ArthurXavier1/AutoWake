<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>AutoWake Painel</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    :root {
      --bg-dark: #121212;
      --sidebar-bg: #1f1f1f;
      --primary-color: #2c4370;
      --secondary-color: #4e73b8;
      --text-light: #d9dce1;
      --hover-color: #5a6677;
      --card-bg: #212121;
    }

    body {
      background-color: var(--bg-dark);
      color: var(--text-light);
      font-family: 'Segoe UI', sans-serif;
    }

    .sidebar {
      background-color: var(--sidebar-bg);
      min-height: 100vh;
    }

    .sidebar .nav-link {
      color: var(--text-light);
      transition: 0.3s;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
      background-color: var(--hover-color);
      border-radius: 0.375rem;
    }

    .navbar {
      background-color: var(--primary-color);
    }

    h1, h2 {
      color: var(--text-light);
    }

    .card {
      background-color: var(--card-bg);
      color: var(--text-light);
      border: none;
      transition: 0.3s;
    }

    .card:hover {
      background-color: var(--hover-color);
    }

    .table {
      background-color: #1e1e1e;
      border-radius: 8px;
      overflow: hidden;
      width: 100%;
    }

    .table th, .table td {
      vertical-align: middle;
      padding: 20px;
      font-size: 1.1rem;
    }

    .table th {
      background-color: #2c4370;
      color: var(--text-light);
    }

    .table td {
      background-color: #212121;
      color: var(--text-light);
    }

    .form-select, .btn {
      background-color: var(--bg-dark);
      color: var(--text-light);
      border: 1px solid var(--secondary-color);
    }

    .form-select:focus, .btn:focus {
      box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.5);
    }

    .search-input {
      background-color: var(--bg-dark);
      border-color: var(--secondary-color);
      color: var(--text-light);
    }

    .search-input:focus {
      box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.5);
    }

    @media (max-width: 768px) {
      .sidebar {
        display: none;
      }
    }

    @media (max-width: 992px) {
      .table th, .table td {
        font-size: 0.95rem;
        padding: 15px;
      }
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-dark sticky-top px-3 mb-4">
    <a class="navbar-brand fw-bold" href="#">
      <img src="img/1.png" alt="LOGO AUTO WAKE" style="height: 50px; width: auto;">
      AutoWake
    </a>
    <div>
      <a href="{{ route('exibe_meu_perfil') }}" class="btn btn-outline-light btn-sm"><i class="bi bi-person"></i> Perfil</a>
      <a href="#" class="btn btn-outline-light btn-sm"><i class="bi bi-box-arrow-right"></i> Sair</a>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 sidebar p-3">
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link active" href="#"><i class="bi bi-speedometer2 me-2"></i>Painel</a></li>
            <li class="nav-item"><a class="nav-link" href="pedidos.html"><i class="bi bi-box-seam me-2"></i>Pedidos</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('exibe_listas') }}" ><i class="bi bi-collection"></i> Monitoramento</a></li>
            <li class="nav-item"><a class="nav-link" href="produtos.html"><i class="bi bi-bag-check me-2"></i>Produtos</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/relatorios') }}"><i class="bi bi-bar-chart-line me-2"></i>Relatórios</a></li>
          </ul>


      </nav>

      <main class="col-md-10 ms-sm-auto px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h1 class="h3">Painel</h1>
          <div>
            <button class="btn btn-sm btn-outline-light me-2" onclick="exportarPDF()"><i class="bi bi-download"></i> Exportar</button>
            <select class="form-select form-select-sm d-inline w-auto bg-dark text-light border-secondary">
              <option>Esta semana</option>
              <option>Este mês</option>
              <option>Personalizado</option>
            </select>
          </div>
        </div>

        <div class="row mb-5">
          <div class="col-md-4">
            <div class="mb-3">
              <input type="text" class="form-control form-control-sm search-input" id="searchChart1" placeholder="Pesquisar por gráfico..." oninput="searchChart('mainChart', 'searchChart1')">
            </div>
            <canvas id="mainChart" class="mb-3"></canvas>
          </div>

          <div class="col-md-4">
            <div class="mb-3">
              <input type="text" class="form-control form-control-sm search-input" id="searchChart2" placeholder="Pesquisar status de entrega..." oninput="searchChart('statusChart', 'searchChart2')">
            </div>
            <canvas id="statusChart" class="mb-3"></canvas>
          </div>

          <div class="col-md-4">
            <div class="mb-3">
              <input type="text" class="form-control form-control-sm search-input" id="searchChart3" placeholder="Pesquisar motoristas..." oninput="searchChart('motoristaChart', 'searchChart3')">
            </div>
            <canvas id="motoristaChart" class="mb-3"></canvas>
          </div>
        </div>

        <section>
          <h2 class="h4 mb-3">Tabela de Monitoramento</h2>
          <input type="text" class="form-control form-control-sm mb-3 search-input" id="searchInput" placeholder="Buscar por motorista ou carga..." oninput="searchTable()">
          <div class="table-responsive">
            <table class="table table-dark table-striped table-bordered align-middle">
              <thead class="table-secondary text-dark">
                <tr>
                  <th>#</th>
                  <th>Motorista</th>
                  <th>Produto</th>
                  <th>Carga</th>
                  <th>Status</th>
                  <th>Valor</th>
                  <th>Endereço</th>
                  <th>Categoria</th>
                  <th>Prioridade</th>
                  <th>Data</th>
                  <th>Ação</th>
                </tr>
              </thead>
              <tbody id="tableBody">
                <tr>
                  <td>1</td>
                  <td>João Silva</td>
                  <td>móveis</td>
                  <td>120 kg</td>
                  <td><span class="badge bg-success">Entregue</span></td>
                  <td>R$ 500,00</td>
                  <td>Rua A, 123</td>
                  <td>Categoria 1</td>
                  <td>Alta</td>
                  <td>10/08/2025</td>
                  <td>
                    <button class="btn btn-outline-warning btn-sm">Editar</button>
                    <button class="btn btn-outline-danger btn-sm">Deletar</button>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Maria Oliveira</td>
                  <td>eletrônicos</td>
                  <td>200 kg</td>
                  <td><span class="badge bg-warning">Em andamento</span></td>
                  <td>R$ 300,00</td>
                  <td>Rua B, 456</td>
                  <td>Categoria 2</td>
                  <td>Média</td>
                  <td>11/08/2025</td>
                  <td>
                    <button class="btn btn-outline-warning btn-sm">Editar</button>
                    <button class="btn btn-outline-danger btn-sm">Deletar</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>
      </main>
    </div>
  </div>

  <div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <i class="bi bi-share-fill me-2"></i>
        <strong class="me-auto">Compartilhar</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        O painel foi compartilhado com sucesso!
      </div>
    </div>
  </div>

  <script>
    function searchChart(chartId, inputId) {
      const input = document.getElementById(inputId).value.toLowerCase();
      const chart = document.getElementById(chartId);

      if (chart) {
        chart.style.display = input ? "block" : "none";
      }
    }

    const ctxMainChart = document.getElementById("mainChart").getContext("2d");
    new Chart(ctxMainChart, {
      type: 'line',
      data: {
        labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio"],
        datasets: [{
          label: "Vendas",
          data: [15, 22, 29, 6, 13],
          borderColor: '#4e73b8',
          backgroundColor: 'transparent',
          borderWidth: 2,
        }]
      },
      options: {
        responsive: true,
        scales: {
          x: { beginAtZero: true },
          y: { beginAtZero: true }
        }
      }
    });

    const ctxStatusChart = document.getElementById("statusChart").getContext("2d");
    new Chart(ctxStatusChart, {
      type: 'pie',
      data: {
        labels: ["Entregue", "Em andamento", "Atrasado",],
        datasets: [{
          label: "Status de Entrega",
          data: [50,30,20],
          backgroundColor: ['#28a745', '#ffc107', '#dc3545', ],
          borderColor: ['#28a745', '#ffc107', '#dc3545', ],
          borderWidth: 1,
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          tooltip: {
            callbacks: {
              label: function(tooltipItem) {
                return tooltipItem.raw + '%';
              }
            }
          }
        }
      }
    });

const ctxMotoristaChart = document.getElementById("motoristaChart").getContext("2d");
new Chart(ctxMotoristaChart, {
  type: 'radar',
  data: {
    labels: ["Motorista João", "Motorista Robson", "Motorista Stella", "Motorista Roberta", "Motorista Ester"],
    datasets: [{
      label: "Avaliação de Motoristas",
      data: [60, 65, 70, 80, 85],  
      borderColor: '#f39c12',  
      backgroundColor: 'rgba(243, 156, 18, 0.2)',
      borderWidth: 2,  
    }]
  },
  options: {
    responsive: true,
    scales: {
      r: {
        min: 0,  
        max: 100,  
        angleLines: {
          display: true  
        },
        grid: {
          color: '#444',  
        },
        ticks: {
          stepSize: 10,  
          showLabelBackdrop: false,  
        }
      }
    },
    plugins: {
      legend: {
        position: 'top',  
      },
      tooltip: {
        callbacks: {
          label: function(tooltipItem) {
            return tooltipItem.raw + '%';  
          }
        }
      }
    }
  }
});

    function searchTable() {
      const input = document.getElementById("searchInput").value.toLowerCase();
      const rows = document.querySelectorAll("#tableBody tr");

      rows.forEach(row => {
        const cells = row.getElementsByTagName("td");
        let match = false;

        for (let i = 0; i < cells.length; i++) {
          if (cells[i].textContent.toLowerCase().includes(input)) {
            match = true;
            break;
          }
        }

        if (match) {
          row.style.display = "";
        } else {
          row.style.display = "none";
        }
      });
    }

    function exportarPDF() {
      alert("Função de exportação em PDF ainda não implementada.");
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>