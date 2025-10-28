<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="icon" href="../img/Icon.png" type="image/x-icon">
    <link rel="stylesheet" href="Tabela.css">
    <title>TABELA DE EMERGENCIAS</title>
</head>
<body>
        <div style="display: flex; align-items:center; justify-content:space-between">

            <h1 class="tabelas-container">Tabelas de Funcionalidades</h1>
            <div style="display: flex; align-items: center">
                
                <div class="filtros">
                    <div class="categoria-input" style="display:flex; justify-content:stretch;" >
                        <label for="Categoria" >Categoria</label>
                        <select id="categoria" class="categoria">
                            <option value="">Selecione uma categoria</option>
                            <option value="">Contatos de Emergência</option>
                            <option value="">Ocorrencia Registradas</option>
                            <option value="">Tabelas de Lugares seguros na estrada</option>
                        </select>
                    </div>
                </div>
                <button id="btn-filtrar" class="btn-filtrar" >Aplicar Filtros</button>
            </div>
        </div>
    </div>


    <div class="container-tabelas">
     <h2> Contatos de Emergência</h2>
        <table>
            <tr>
                <th>Tipo de Serviço</th>
                <th>Nome / Local</th>
                <th>Telefone</th>
                <th>Observações</th>
            </tr>
            <tr>
                <td>Polícia Rodoviária</td>
                <td>PRF Posto KM 100</td>
                <td>191</td>
                <td>24h</td>
            </tr>
            <tr>
                <td>Oficina Mecânica</td>
                <td>Mecânica do João</td>
                <td>(11) 99323-4422</td>
                <td>Próxima ao km 85</td>
            </tr>
            <tr>
                <td>Posto de Combustível</td>
                <td>Posto Petro Truck</td>
                <td>(11) 99732-3445</td>
                <td>24h</td>
            </tr>

             
        <table>
            <h2>Locais de Segurança </h2>
            <tr>
                <th>Lugares Seguros</th>
                <th>Nome / Local</th>
                <th>Telefone</th>
                <th>Observações</th>
            </tr>
            <tr>
                <td>Posto de Gasolina, Iperó-SP</td>
                <td>Posto Ipiranga - Avenida Castelo branco, 185</td>
                <td>(11) 99890-5634</td>
                <td>24h</td>
            </tr>
            <tr>
                <td>Posto de Gasolina, Iperó-SP</td>
                <td>Posto Padovan - Avenida Castelo branco, 620</td>
                <td>(32) 32322-4422</td>
                <td>Próxima ao km 85</td>
            </tr>
            <tr>
                <td>Posto Graal 56, Jundiaí-SP</td>
                <td>Rod. dos Bandeirantes</td>
                <td>(11) 4582-8000</td>
                <td>24h</td>
            </tr>
            <tr>
                <td>Área de Descanso, Taquarituba-SP</td>
                <td>SP-255 - km 311-  ViaPaulista</td>
                <td>(11) 99732-3445</td>
                <td>Vestiário gratuito, 24h</td>
            </tr>
            <tr>
                <td>Área de Descanso, Bocaina-SP</td>
                <td>SP-255 - km 136 - ViaPaulista</td>
                <td>(11) 99732-3445</td>
                <td>24h</td>
            </tr>
            <tr>
                <td>Área de Descanso, Flórida Paulista-SP</td>
                <td>SP-294 - Eixo SP</td>
                <td>(11) 99732-3445</td>
                <td>Refeitorio, 24h</td>
            </tr>
            <tr>
                <td>Área de Descanso, Martinópolis-SP</td>
                <td>SP-284 - Eixo SP</td>
                <td>(11) 99732-3445</td>
                <td>24h</td>
            </tr>
        </table>

        <h2>Checklist de Segurança</h2>
        <table>
            <tr>
                
                <th>Item de Verificação</th>
                <th>Status</th>
            </tr>
            <tr>
                <td>Pneus alibrados</td>
                <td class="status-ok">✅</td>
            </tr>
            <tr>
                <td>Freios revisados</td>
                <td class="status-ok">✅</td>
            </tr>
            <tr>
                <td>Documentos em dia</td>
                <td class="status-alerta">⚠️</td>
            </tr>
            <tr>
                <td>Carga bem fixada</td>
                <td class="status-ok">✅</td>
            </tr>
        </table>
        </div>

    <footer>
        <div class="footer-waves">
          <img src="/img/wave.svg" alt="Ondas decorativas">
        </div>
    </footer>

</head>   
</body>