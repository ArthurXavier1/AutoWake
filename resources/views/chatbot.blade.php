<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot AutoWake</title>
    <link rel="icon" href="img/Icon.png" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .chat-container {
            width: 100%;
            max-width: 400px;
            height: 600px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
        }
        .chat-header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }
        .chat-messages {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }
        .message {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 10px;
            max-width: 70%;
            word-wrap: break-word;
        }
        .message.user {
            background-color: #007bff;
            color: white;
            align-self: flex-end;
        }
        .message.bot {
            background-color: #e9ecef;
            color: black;
            align-self: flex-start;
        }
        .chat-input {
            display: flex;
            padding: 15px;
            border-top: 1px solid #ddd;
        }
        .chat-input input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 20px;
            outline: none;
        }
        .chat-input button {
            margin-left: 10px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }
        .chat-input button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">
            <h3>Chatbot AutoWake</h3>
        </div>
        <div class="chat-messages" id="chat-messages">
            <div class="message bot">Olá! Sou o chatbot do AutoWake. Como posso ajudar você hoje?</div>
        </div>
        <div class="chat-input">
            <input type="text" id="message-input" placeholder="Digite sua mensagem...">
            <button id="send-button">Enviar</button>
        </div>
    </div>

    <script>
        const chatMessages = document.getElementById('chat-messages');
        const messageInput = document.getElementById('message-input');
        const sendButton = document.getElementById('send-button');

        function addMessage(content, sender) {
            const messageDiv = document.createElement('div');
            messageDiv.classList.add('message', sender);
            messageDiv.textContent = content;
            chatMessages.appendChild(messageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function getBotResponse(userMessage) {
            // Respostas baseadas em palavras-chave e contexto
            const lowerMessage = userMessage.toLowerCase();

            // Saudações
            if (lowerMessage.includes('olá') || lowerMessage.includes('oi') || lowerMessage.includes('bom dia') || lowerMessage.includes('boa tarde') || lowerMessage.includes('boa noite')) {
                return 'Olá! Sou o assistente virtual do AutoWake. Posso ajudar com dúvidas sobre o sistema AutoWake, Laravel, PHP, bancos de dados e muito mais. Como posso ajudar você hoje?';
            }

            // Ajuda geral
            if (lowerMessage.includes('ajuda') || lowerMessage.includes('socorro') || lowerMessage.includes('não sei')) {
                return 'Estou aqui para ajudar com qualquer dúvida! Posso responder sobre: AutoWake (fretes, motoristas, etc.), Laravel (framework PHP), PHP (linguagem), bancos de dados (SQL, MySQL), programação em geral e muito mais. O que você gostaria de saber?';
            }

            // === AUTO WAKE SPECIFIC ===

            // Fretes
            if (lowerMessage.includes('frete') || lowerMessage.includes('carga') || lowerMessage.includes('entrega')) {
                return 'Sobre fretes no AutoWake: Você pode cadastrar novos fretes na seção "Cadastro de Fretes". Para visualizar fretes existentes, acesse o Dashboard ou a seção de Relatórios. Cada frete pode ter origem, destino, valor, motorista responsável e status. Precisa de ajuda específica?';
            }

            // Motoristas
            if (lowerMessage.includes('motorista') || lowerMessage.includes('condutor') || lowerMessage.includes('motoristas')) {
                return 'Para gerenciar motoristas no AutoWake, vá para a seção "Cadastros". Lá você pode adicionar, editar ou visualizar informações dos motoristas (nome, CNH, telefone, etc.). Os motoristas são ranqueados por desempenho. Quer saber mais sobre algum aspecto específico?';
            }

            // Caminhões
            if (lowerMessage.includes('caminhão') || lowerMessage.includes('veículo') || lowerMessage.includes('caminhoes') || lowerMessage.includes('frota')) {
                return 'Informações sobre caminhões estão disponíveis em "Cadastro de Caminhão". Você pode registrar novos veículos (placa, modelo, ano, capacidade), editar dados existentes ou consultar a frota completa. A manutenção preventiva também é gerenciada aqui. O que você precisa saber sobre os caminhões?';
            }

            // Rotas
            if (lowerMessage.includes('rota') || lowerMessage.includes('trajeto') || lowerMessage.includes('percurso')) {
                return 'Para iniciar ou gerenciar rotas no AutoWake, acesse "Iniciar Rotas". Lá você pode planejar trajetos, acompanhar progresso em tempo real, otimizar caminhos e monitorar localização via GPS. Tem alguma dúvida sobre rotas ou navegação?';
            }

            // Relatórios
            if (lowerMessage.includes('relatório') || lowerMessage.includes('relatorios') || lowerMessage.includes('dados') || lowerMessage.includes('estatísticas')) {
                return 'Os relatórios estão disponíveis na seção "Relatórios". Você pode gerar relatórios sobre desempenho de motoristas, fretes realizados, custos operacionais, quilometragem e muito mais. Os dados podem ser exportados em PDF ou Excel. Qual tipo de relatório você está procurando?';
            }

            // Dashboard
            if (lowerMessage.includes('dashboard') || lowerMessage.includes('painel') || lowerMessage.includes('visão geral')) {
                return 'O Dashboard AutoWake oferece uma visão geral completa do sistema, incluindo métricas de desempenho, atividades recentes, alertas de manutenção, status de fretes ativos e indicadores financeiros. Acesse "Dashboard" no menu lateral para ver tudo em tempo real.';
            }

            // Cadastros
            if (lowerMessage.includes('cadastro') || lowerMessage.includes('cadastrar') || lowerMessage.includes('registrar')) {
                return 'Para cadastros no AutoWake, vá para "Cadastros" no menu. Você pode registrar motoristas, caminhões, fretes, funcionários e outros itens do sistema. Todos os cadastros incluem validação de dados e histórico de alterações. O que você gostaria de cadastrar?';
            }

            // Perfil
            if (lowerMessage.includes('perfil') || lowerMessage.includes('conta') || lowerMessage.includes('usuário')) {
                return 'Para editar seu perfil no AutoWake, acesse "Perfil" no menu lateral. Lá você pode atualizar suas informações pessoais, alterar senha, configurar notificações e gerenciar permissões de acesso.';
            }

            // Tabelas
            if (lowerMessage.includes('tabela') || lowerMessage.includes('tabelas') || lowerMessage.includes('dados tabulares')) {
                return 'A seção "Tabelas" mostra dados organizados em formato tabular. Você pode visualizar e gerenciar informações de forma estruturada, com filtros e ordenação. É útil para consultas rápidas de motoristas, veículos ou fretes. O que você quer ver nas tabelas?';
            }

            // Funcionários
            if (lowerMessage.includes('funcionário') || lowerMessage.includes('funcionarios') || lowerMessage.includes('equipe')) {
                return 'Para gerenciar funcionários no AutoWake, acesse "Funcionários" no menu. Você pode adicionar, editar ou remover membros da equipe, definir cargos, salários e permissões. Precisa de ajuda com funcionários ou gestão de equipe?';
            }

            // Lista
            if (lowerMessage.includes('lista') || lowerMessage.includes('listagem') || lowerMessage.includes('listas')) {
                return 'As listas estão disponíveis em "Lista" ou "Listagroup". Você pode ver agrupamentos de dados como motoristas por região, fretes por status, veículos por tipo, etc. É uma forma organizada de visualizar informações categorizadas. Qual lista você quer consultar?';
            }

            // Datatable
            if (lowerMessage.includes('datatable') || lowerMessage.includes('tabela de dados')) {
                return 'O Datatable oferece uma visualização interativa dos dados no AutoWake. Acesse "Datatble" para filtrar, ordenar, pesquisar e paginar informações de forma avançada. Suporta exportação e é totalmente responsivo.';
            }

            // Principal
            if (lowerMessage.includes('principal') || lowerMessage.includes('inicial') || lowerMessage.includes('home')) {
                return 'A página principal (AutoWake) mostra um resumo completo do sistema com carrossel de imagens, avisos importantes, atividades recentes, ranking de motoristas, cotações de combustível e destaques de desempenho. É o ponto de partida para navegar pelo AutoWake.';
            }

            // Combustível
            if (lowerMessage.includes('combustível') || lowerMessage.includes('gasolina') || lowerMessage.includes('diesel') || lowerMessage.includes('etanol')) {
                return 'As cotações de combustível são exibidas na página principal do AutoWake. Atualmente: Gasolina Comum R$ 6,79, Gasolina Aditivada R$ 6,33, Etanol R$ 4,13, Diesel R$ 6,24. O sistema também calcula custos de combustível por rota. Para mais detalhes, consulte fontes oficiais.';
            }

            // Ranking
            if (lowerMessage.includes('ranking') || lowerMessage.includes('classificação') || lowerMessage.includes('pontuação')) {
                return 'O ranking de motoristas é mostrado na página principal do AutoWake. Os top 5 atuais são: 1º Carlos Andrade (95 pts), 2º Fernanda Lima (89 pts), 3º João Silva (85 pts), 4º Marina Costa (80 pts), 5º Pedro Santos (78 pts). A pontuação é baseada em segurança, pontualidade e eficiência.';
            }

            // Avisos
            if (lowerMessage.includes('aviso') || lowerMessage.includes('notificação') || lowerMessage.includes('alerta')) {
                return 'Os avisos recentes estão na página principal: Revisão do sistema programada para 05/10, novas atualizações de desempenho disponíveis, teste de integração marcado para sexta-feira. O sistema também envia alertas automáticos para manutenção de veículos e vencimento de documentos!';
            }

            // Atividades
            if (lowerMessage.includes('atividade') || lowerMessage.includes('recente') || lowerMessage.includes('últimas ações')) {
                return 'Atividades recentes no AutoWake: Novo veículo cadastrado (Ford Ranger), relatório de desempenho exportado, configuração de alertas atualizada, rota finalizada com sucesso. Veja mais detalhes no Dashboard para histórico completo.';
            }

            // Destaques
            if (lowerMessage.includes('destaque') || lowerMessage.includes('conquista') || lowerMessage.includes('realização')) {
                return 'Seus destaques no AutoWake incluem: Melhor desempenho de setembro, tempo de resposta 20% mais rápido, meta de viagens concluída, economia de combustível otimizada. Parabéns pelo ótimo trabalho! Continue assim!';
            }

            // === LARAVEL ===

            // Laravel geral
            if (lowerMessage.includes('laravel') && !lowerMessage.includes('php')) {
                return 'Laravel é um framework PHP elegante e poderoso para desenvolvimento web. Possui sintaxe expressiva, ferramentas robustas e uma comunidade ativa. Principais recursos: Eloquent ORM, Blade templating, Artisan CLI, migrations, seeders. O AutoWake foi desenvolvido em Laravel! O que você quer saber sobre Laravel?';
            }

            // Artisan
            if (lowerMessage.includes('artisan') || lowerMessage.includes('php artisan')) {
                return 'Artisan é a interface de linha de comando do Laravel. Comandos úteis: "php artisan make:model NomeModelo", "php artisan make:controller NomeController", "php artisan migrate", "php artisan tinker", "php artisan route:list". É essencial para desenvolvimento Laravel!';
            }

            // Migrations
            if (lowerMessage.includes('migration') || lowerMessage.includes('migrate')) {
                return 'Migrations no Laravel permitem versionar o schema do banco de dados. Crie com "php artisan make:migration nome_migration". Use up() para criar tabelas e down() para reverter. Execute com "php artisan migrate". Elas garantem consistência entre ambientes!';
            }

            // Eloquent
            if (lowerMessage.includes('eloquent') || lowerMessage.includes('orm')) {
                return 'Eloquent é o ORM do Laravel. Permite trabalhar com banco de dados usando objetos PHP. Recursos: relationships (hasOne, hasMany, belongsTo), mutators, accessors, scopes, soft deletes. Exemplo: User::where("ativo", 1)->get(). Muito poderoso!';
            }

            // Blade
            if (lowerMessage.includes('blade') || lowerMessage.includes('template')) {
                return "Blade é o engine de templates do Laravel. Sintaxe simples: \$variavel para output, @@if/@@endif para condicionais, @@foreach/@@endforeach para loops. Suporta layouts, components e diretivas customizadas. Muito mais limpo que PHP puro!";
            }

            // Routes
            if (lowerMessage.includes('route') || lowerMessage.includes('rota') && lowerMessage.includes('laravel')) {
                return 'Rotas no Laravel são definidas em routes/web.php ou routes/api.php. Sintaxe: Route::get("/caminho", [Controller::class, "metodo"])->name("nome_rota"). Suporta middleware, parâmetros e grupos. Use "php artisan route:list" para ver todas!';
            }

            // Controllers
            if (lowerMessage.includes('controller') && lowerMessage.includes('laravel')) {
                return 'Controllers no Laravel organizam a lógica da aplicação. Crie com "php artisan make:controller NomeController". Métodos como index(), create(), store(), show(), edit(), update(), destroy() seguem convenções REST. Use resource controllers para CRUD completo!';
            }

            // Models
            if (lowerMessage.includes('model') && lowerMessage.includes('laravel')) {
                return 'Models no Laravel representam tabelas do banco. Estendem Illuminate\\Database\\Eloquent\\Model. Defina $fillable, relationships, mutators. Use para queries complexas: User::with("posts")->where("ativo", 1)->paginate(10).';
            }

            // Middleware
            if (lowerMessage.includes('middleware') && lowerMessage.includes('laravel')) {
                return 'Middleware no Laravel filtra requisições HTTP. Crie com "php artisan make:middleware NomeMiddleware". Use para autenticação, CORS, logging, etc. Registre em app/Http/Kernel.php. Execute antes ou depois dos controllers!';
            }

            // Authentication
            if (lowerMessage.includes('auth') || lowerMessage.includes('autenticação') && lowerMessage.includes('laravel')) {
                return 'Laravel tem sistema de autenticação built-in. Use "php artisan make:auth" (versões antigas) ou Jetstream/Breeze. Middleware "auth" protege rotas. Métodos Auth::check(), Auth::user(), Auth::login(). Suporta guards múltiplos!';
            }

            // === PHP ===

            // PHP geral
            if (lowerMessage.includes('php') && !lowerMessage.includes('laravel')) {
                return 'PHP é uma linguagem de script server-side popular para web. Versão atual: 8.2. Recursos principais: tipagem dinâmica, OOP, namespaces, traits, generators, match expressions. Ótimo para web com frameworks como Laravel, Symfony. O que você quer saber sobre PHP?';
            }

            // Variáveis
            if (lowerMessage.includes('variável') || lowerMessage.includes('variable')) {
                return 'Em PHP, variáveis começam com $. Tipos: string, int, float, bool, array, object, null. Não precisa declarar tipo. Use var_dump() para debug. Exemplo: $nome = "João"; $idade = 25;';
            }

            // Arrays
            if (lowerMessage.includes('array') && !lowerMessage.includes('laravel')) {
                return 'Arrays em PHP são flexíveis. Sintaxe: $arr = [1, 2, 3]; ou $arr = array(1, 2, 3);. Funções úteis: array_push(), array_pop(), array_map(), array_filter(), count(). Suporta chaves associativas: $pessoa["nome"] = "João";';
            }

            // Funções
            if (lowerMessage.includes('função') || lowerMessage.includes('function') && !lowerMessage.includes('php artisan')) {
                return 'Funções em PHP: function nomeFuncao($parametro) { return $resultado; }. Podem ter parâmetros default, referências (&), tipos (PHP 7+). Funções nativas: strlen(), explode(), implode(), date(), json_encode(). Organize código em funções!';
            }

            // Classes
            if (lowerMessage.includes('class') || lowerMessage.includes('classe') && !lowerMessage.includes('laravel')) {
                return 'Classes em PHP: class NomeClasse { propriedades e métodos }. Use public/private/protected. Herança com extends. Interfaces, traits, abstract classes. Exemplo: class Carro { public $modelo; public function acelerar() { ... } }';
            }

            // PDO
            if (lowerMessage.includes('pdo') || lowerMessage.includes('database') && lowerMessage.includes('php')) {
                return 'PDO (PHP Data Objects) é a extensão recomendada para acesso a bancos de dados. Sintaxe: $pdo = new PDO("mysql:host=localhost;dbname=teste", "user", "pass");. Métodos preparados previnem SQL injection. Use para MySQL, PostgreSQL, etc.';
            }

            // === BANCO DE DADOS ===

            // SQL geral
            if (lowerMessage.includes('sql') || lowerMessage.includes('banco') || lowerMessage.includes('database')) {
                return 'SQL (Structured Query Language) é usado para gerenciar bancos de dados relacionais. Comandos principais: SELECT (consultar), INSERT (inserir), UPDATE (atualizar), DELETE (remover). JOINs para relacionamentos. O AutoWake usa MySQL. O que você quer saber sobre SQL?';
            }

            // MySQL
            if (lowerMessage.includes('mysql')) {
                return 'MySQL é um SGBD relacional popular, usado pelo AutoWake. Recursos: InnoDB (transações), índices, procedures, triggers, views. Conecte via PHP com PDO ou mysqli. Comandos: CREATE TABLE, ALTER TABLE, SELECT com JOINs. Muito rápido e confiável!';
            }

            // SELECT
            if (lowerMessage.includes('select')) {
                return 'SELECT consulta dados: SELECT coluna1, coluna2 FROM tabela WHERE condição ORDER BY coluna LIMIT 10. Use JOIN para múltiplas tabelas: SELECT * FROM usuarios u JOIN pedidos p ON u.id = p.usuario_id. Essencial para qualquer aplicação!';
            }

            // INSERT
            if (lowerMessage.includes('insert')) {
                return 'INSERT adiciona dados: INSERT INTO tabela (col1, col2) VALUES ("valor1", "valor2"). Para múltiplas linhas: VALUES ("val1", "val2"), ("val3", "val4"). Use com prepared statements para segurança!';
            }

            // UPDATE
            if (lowerMessage.includes('update')) {
                return 'UPDATE modifica dados existentes: UPDATE tabela SET coluna = "novo_valor" WHERE condição. IMPORTANTE: Sempre use WHERE para não atualizar tudo! Exemplo: UPDATE usuarios SET ativo = 0 WHERE ultimo_login < "2023-01-01";';
            }

            // DELETE
            if (lowerMessage.includes('delete')) {
                return 'DELETE remove dados: DELETE FROM tabela WHERE condição. CUIDADO: Sem WHERE deleta tudo! Use soft deletes em aplicações (adicionar coluna deleted_at). Exemplo: DELETE FROM usuarios WHERE ativo = 0;';
            }

            // JOIN
            if (lowerMessage.includes('join')) {
                return 'JOIN combina tabelas: INNER JOIN (apenas matches), LEFT JOIN (todos da esquerda), RIGHT JOIN (todos da direita), FULL JOIN (todos). Exemplo: SELECT u.nome, p.titulo FROM usuarios u INNER JOIN posts p ON u.id = p.usuario_id;';
            }

            // === PROGRAMAÇÃO GERAL ===

            // JavaScript
            if (lowerMessage.includes('javascript') || lowerMessage.includes('js')) {
                return 'JavaScript é linguagem de programação para web. Executa no navegador (frontend) e servidor (Node.js). Recursos: DOM manipulation, async/await, promises, arrow functions, destructuring. O chatbot do AutoWake é feito em JavaScript puro!';
            }

            // HTML/CSS
            if (lowerMessage.includes('html') || lowerMessage.includes('css')) {
                return 'HTML estrutura páginas web, CSS estiliza. HTML5: semântico (<header>, <nav>, <main>). CSS3: flexbox, grid, animations, media queries. Use frameworks como Bootstrap (usado no AutoWake) para produtividade!';
            }

            // Git
            if (lowerMessage.includes('git') || lowerMessage.includes('github')) {
                return 'Git controla versão de código. Comandos essenciais: git init, git add ., git commit -m "msg", git push, git pull. Branches para features. GitHub para colaboração. Use sempre em projetos!';
            }

            // API
            if (lowerMessage.includes('api') || lowerMessage.includes('rest')) {
                return 'APIs permitem comunicação entre sistemas. REST: GET (ler), POST (criar), PUT (atualizar), DELETE (remover). Laravel facilita criação com resource controllers. Use JSON, autenticação JWT ou OAuth.';
            }

            // === PERGUNTAS SOBRE O CHATBOT ===

            // Perguntas sobre o chatbot
            if (lowerMessage.includes('chatbot') || lowerMessage.includes('assistente') || lowerMessage.includes('você') || lowerMessage.includes('quem é você')) {
                return 'Eu sou o chatbot inteligente do AutoWake, seu assistente virtual completo! Posso ajudar com dúvidas sobre o sistema AutoWake, desenvolvimento em Laravel/PHP, bancos de dados, programação em geral e muito mais. Estou sempre aprendendo e pronto para ajudar!';
            }

            // Despedidas
            if (lowerMessage.includes('tchau') || lowerMessage.includes('até logo') || lowerMessage.includes('obrigado') || lowerMessage.includes('valeu')) {
                return 'Foi um prazer ajudar! Se precisar de mais alguma coisa sobre AutoWake, Laravel, PHP, bancos de dados ou programação, é só chamar. Até logo!';
            }

            // Resposta padrão para mensagens não reconhecidas
            return 'Hmm, não entendi completamente sua pergunta. Posso ajudar com: AutoWake (fretes, motoristas, etc.), Laravel (framework, migrations, Eloquent), PHP (linguagem, funções, classes), bancos de dados (SQL, MySQL), programação geral (JavaScript, HTML, Git) e muito mais. Tente reformular ou pergunte algo específico!';
        }

        function sendMessage() {
            const message = messageInput.value.trim();
            if (message) {
                addMessage(message, 'user');
                messageInput.value = '';
                setTimeout(() => {
                    const botResponse = getBotResponse(message);
                    addMessage(botResponse, 'bot');
                }, 1000); // Simula delay de resposta
            }
        }

        sendButton.addEventListener('click', sendMessage);
        messageInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });
    </script>
</body>
</html>
