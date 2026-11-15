
<?php

// UTILIZADORES DO THINKING-BOT

$utilizadores = [
    [
        'id' => 1,
        'nome' => 'Aluno 001',
        'perfil' => 'Aluno',
        'codigo' => 'A001',
        'estado' => 'Ativo'
    ],
    [
        'id' => 2,
        'nome' => 'Aluno 002',
        'perfil' => 'Aluno',
        'codigo' => 'A002',
        'estado' => 'Ativo'
    ],
    [
        'id' => 3,
        'nome' => 'Professor 001',
        'perfil' => 'Professor',
        'codigo' => 'P001',
        'estado' => 'Ativo'
    ],
    [
        'id' => 4,
        'nome' => 'Orientador 001',
        'perfil' => 'Orientador',
        'codigo' => 'O001',
        'estado' => 'Ativo'
    ],
    [
        'id' => 5,
        'nome' => 'Investigador 001',
        'perfil' => 'Investigador',
        'codigo' => 'I001',
        'estado' => 'Ativo'
    ]
];

// ATIVIDADES DA PAP

$atividades = [
    [
        'id' => 1,
        'nome' => 'Programação 1',
        'disciplina' => 'Programação',
        'ano' => '10.º ano',
        'professor' => 'Professor 001',
        'estado' => 'Ativa'
    ],
    [
        'id' => 2,
        'nome' => 'Redes de Comunicação 1',
        'disciplina' => 'Redes',
        'ano' => '10.º ano',
        'professor' => 'Professor 001',
        'estado' => 'Ativa'
    ],
    [
        'id' => 3,
        'nome' => 'Programação 2',
        'disciplina' => 'Programação',
        'ano' => '11.º ano',
        'professor' => 'Professor 001',
        'estado' => 'Ativa'
    ],
    [
        'id' => 4,
        'nome' => 'Redes de Comunicação 2',
        'disciplina' => 'Redes',
        'ano' => '11.º ano',
        'professor' => 'Professor 001',
        'estado' => 'Ativa'
    ]
];

// PROJETOS DE INVESTIGAÇÃO

$projetos = [
    [
        'id' => 1,
        'nome' => 'Aprendizagem de Programação',
        'responsavel' => 'Investigador 001',
        'estado' => 'Ativo'
    ],
    [
        'id' => 2,
        'nome' => 'Aprendizagem de Redes',
        'responsavel' => 'Investigador 001',
        'estado' => 'Ativo'
    ],
    [
        'id' => 3,
        'nome' => 'Interação com o Thinking-Bot',
        'responsavel' => 'Investigador 001',
        'estado' => 'Ativo'
    ]
];

// RELATÓRIOS DE DEMONSTRAÇÃO

$relatorios = [
    [
        'disciplina' => 'Programação 1',
        'progresso' => 80,
        'respostas' => 40,
        'acertos' => 32
    ],
    [
        'disciplina' => 'Redes de Comunicação 1',
        'progresso' => 65,
        'respostas' => 30,
        'acertos' => 20
    ],
    [
        'disciplina' => 'Programação 2',
        'progresso' => 90,
        'respostas' => 50,
        'acertos' => 45
    ],
    [
        'disciplina' => 'Redes de Comunicação 2',
        'progresso' => 70,
        'respostas' => 35,
        'acertos' => 25
    ]
];

// NAVEGAÇÃO E PESQUISA

$pagina = $_GET['pagina'] ?? 'inicio';
$search = $_GET['search'] ?? '';

$resultadosAtividades = [];
$resultadosUtilizadores = [];
$resultadosProjetos = [];

// PESQUISAR ATIVIDADES

foreach ($atividades as $atividade) {
    if (
        $search === '' ||
        stripos($atividade['nome'], $search) !== false
    ) {
        $resultadosAtividades[] = $atividade;
    }
}

// PESQUISAR UTILIZADORES

foreach ($utilizadores as $utilizador) {
    if (
        $search === '' ||
        stripos($utilizador['nome'], $search) !== false ||
        stripos($utilizador['perfil'], $search) !== false
    ) {
        $resultadosUtilizadores[] = $utilizador;
    }
}

// PESQUISAR PROJETOS

foreach ($projetos as $projeto) {
    if (
        $search === '' ||
        stripos($projeto['nome'], $search) !== false
    ) {
        $resultadosProjetos[] = $projeto;
    }
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Thinking-Bot - Administração</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #cfd9e2;
            color: #696464;
            margin: 0;
        }

        .menu {
            background-color: #172b55;
            width: 230px;
            height: 100vh;
            position: fixed;
            padding: 20px;
        }

        .menu h2 {
            color: white;
            text-align: center;
            margin-bottom: 35px;
        }

        .menu a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 13px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .menu a:hover {
            background-color: #365c9d;
        }

        .conteudo {
            margin-left: 230px;
            padding: 30px;
            min-height: 100vh;
        }

        h1 {
            color: #172b55;
        }

        .subtitulo {
            color: #020101;
        }

        .estatisticas {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin: 30px 0;
        } 

        .estatistica {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            flex: 1;
            min-width: 180px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }

        .estatistica h2 {
            color: #365c9d;
            font-size: 32px;
            margin: 0;
        }

        .estatistica p {
            color: #666;
        }

        .cartoes {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 25px;
        }

        .cartao {
            background-color: white;
            width: 260px;
            padding: 20px;
            border-radius: 10px;
            border-top: 5px solid #365c9d;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }

        .cartao h2 {
            font-size: 21px;
            color: #172b55;
        }

        .cartao p {
            line-height: 1.5;
        }

        form {
            margin: 25px 0;
        }

        input, textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-family: Arial, sans-serif;
        }

        input {
            width: 250px;
            max-width: 100%;
        }

        textarea {
            width: 100%;
            min-height: 80px;
        }

        button {
            padding: 10px 15px;
            background-color: #365c9d;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #253f70;
        }

        .painel {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            margin-top: 25px;
        }

        .barra {
            background-color: #e2e8f0;
            height: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .progresso {
            background-color: #365c9d;
            height: 15px;
            border-radius: 10px;
        }

        .campo {
            margin-bottom: 20px;
        }

        .campo label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .campo input {
            width: 100%;
        }

        footer {
            text-align: center;
            color: #777;
            margin-top: 50px;
            padding: 20px;
            font-size: 13px;
        }

        @media (max-width: 700px) {
            .menu {
                position: static;
                width: 100%;
                height: auto;
            }

            .conteudo {
                margin-left: 0;
                padding: 20px;
            }

            .cartao {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- MENU LATERAL -->

    <div class="menu">
        <h2>Thinking-Bot</h2>

        <a href="index.php?pagina=inicio">Painel Geral</a>
        <a href="index.php?pagina=utilizadores">Utilizadores</a>
        <a href="index.php?pagina=atividades">Atividades</a>
        <a href="index.php?pagina=bot">Configuração do Bot</a>
        <a href="index.php?pagina=projetos">Projetos</a>
        <a href="index.php?pagina=relatorios">Relatórios</a>
    </div>

    <main class="conteudo">

        <!-- PÁGINA INICIAL -->

        <?php if ($pagina === 'inicio'): ?>

            <h1>Portal de Administração</h1>

            <p class="subtitulo">
                Bem-vindo ao portal de administração do Thinking-Bot.
            </p>

            <div class="estatisticas">

                <div class="estatistica">
                    <h2><?= count($utilizadores) ?></h2>
                    <p>Total de utilizadores</p>
                </div>

                <div class="estatistica">
                    <h2><?= count($atividades) ?></h2>
                    <p>Atividades</p>
                </div>

                <div class="estatistica">
                    <h2><?= count($projetos) ?></h2>
                    <p>Projetos</p>
                </div>

            </div>

            <div class="painel">
                <h2>Sobre o Thinking-Bot</h2>

                <p>
                    O Thinking-Bot é uma plataforma educativa
                    que permite aos alunos aprender através
                    da interação com um chatbot.
                </p>

                <p>
                    O portal de administração permite consultar
                    utilizadores, atividades, projetos e relatórios.
                </p>
            </div>

        <?php endif; ?>

        <!-- UTILIZADORES -->

        <?php if ($pagina === 'utilizadores'): ?>

            <h1>Gestão de Utilizadores</h1>

            <form method="GET" action="index.php">
                <input type="hidden" name="pagina" value="utilizadores">

                <input
                    type="text"
                    name="search"
                    placeholder="Pesquisar utilizador..."
                    value="<?= htmlspecialchars($search, ENT_QUOTES, 'UTF-8') ?>"
                >

                <button type="submit">Pesquisar</button>
            </form>

            <div class="cartoes">

                <?php if (empty($resultadosUtilizadores)): ?>
                    <p>Não foram encontrados utilizadores.</p>
                <?php endif; ?>

                <?php foreach ($resultadosUtilizadores as $utilizador): ?>

                    <div class="cartao">
                        <h2><?= htmlspecialchars($utilizador['nome']) ?></h2>

                        <p>ID: <?= $utilizador['id'] ?></p>
                        <p>Perfil: <?= htmlspecialchars($utilizador['perfil']) ?></p>
                        <p>Código: <?= htmlspecialchars($utilizador['codigo']) ?></p>
                        <p>Estado: <?= htmlspecialchars($utilizador['estado']) ?></p>
                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

        <!-- ATIVIDADES -->

        <?php if ($pagina === 'atividades'): ?>

            <h1>Gestão de Atividades</h1>

            <form method="GET" action="index.php">
                <input type="hidden" name="pagina" value="atividades">

                <input
                    type="text"
                    name="search"
                    placeholder="Pesquisar atividade..."
                    value="<?= htmlspecialchars($search, ENT_QUOTES, 'UTF-8') ?>"
                >

                <button type="submit">Pesquisar</button>
            </form>

            <div class="cartoes">

                <?php if (empty($resultadosAtividades)): ?>
                    <p>Não foram encontradas atividades.</p>
                <?php endif; ?>

                <?php foreach ($resultadosAtividades as $atividade): ?>

                    <div class="cartao">

                        <h2><?= htmlspecialchars($atividade['nome']) ?></h2>

                        <p>ID: <?= $atividade['id'] ?></p>
                        <p>Disciplina: <?= htmlspecialchars($atividade['disciplina']) ?></p>
                        <p>Ano escolar: <?= htmlspecialchars($atividade['ano']) ?></p>
                        <p>Professor: <?= htmlspecialchars($atividade['professor']) ?></p>
                        <p>Estado: <?= htmlspecialchars($atividade['estado']) ?></p>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

        <!-- CONFIGURAÇÃO DO BOT -->

        <?php if ($pagina === 'bot'): ?>

            <h1>Configuração do Thinking-Bot</h1>

            <div class="painel">

                <h2>Informações do Chatbot</h2>

                <div class="campo">
                    <label>Nome do Bot</label>
                    <input type="text" value="Thinking-Bot" readonly>
                </div>

                <div class="campo">
                    <label>Temas permitidos</label>
                    <input type="text" value="Programação e Redes" readonly>
                </div>

                <div class="campo">
                    <label>Objetivos pedagógicos</label>
                    <textarea readonly>Ajudar os alunos a compreender a matéria através de perguntas, respostas e justificações.</textarea>
                </div>

                <div class="campo">
                    <label>Restrições</label>
                    <textarea readonly>O bot deve responder apenas a perguntas relacionadas com o tema definido pelo professor.</textarea>
                </div>

                <div class="campo">
                    <label>Mensagem inicial</label>
                    <textarea readonly>Olá! Hoje vamos aprender um novo tema. Estás preparado?</textarea>
                </div>

                <p>Esta página apresenta as configurações de demonstração do Thinking-Bot.</p>

            </div>

        <?php endif; ?>

        <!-- PROJETOS -->

        <?php if ($pagina === 'projetos'): ?>

            <h1>Gestão de Projetos</h1>

            <form method="GET" action="index.php">
                <input type="hidden" name="pagina" value="projetos">

                <input
                    type="text"
                    name="search"
                    placeholder="Pesquisar projeto..."
                    value="<?= htmlspecialchars($search, ENT_QUOTES, 'UTF-8') ?>"
                >

                <button type="submit">Pesquisar</button>
            </form>

            <div class="cartoes">

                <?php if (empty($resultadosProjetos)): ?>
                    <p>Não foram encontrados projetos.</p>
                <?php endif; ?>

                <?php foreach ($resultadosProjetos as $projeto): ?>

                    <div class="cartao">
                        <h2><?= htmlspecialchars($projeto['nome']) ?></h2>

                        <p>ID: <?= $projeto['id'] ?></p>
                        <p>Responsável: <?= htmlspecialchars($projeto['responsavel']) ?></p>
                        <p>Estado: <?= htmlspecialchars($projeto['estado']) ?></p>
                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

        <!-- RELATÓRIOS -->

        <?php if ($pagina === 'relatorios'): ?>

            <h1>Relatórios de Progresso</h1>

            <div class="painel">

                <h2>Evolução dos Alunos</h2>

                <p class="subtitulo">
                    Dados fictícios para demonstração.
                </p>

                <?php foreach ($relatorios as $relatorio): ?>

                    <p>
                        <strong><?= htmlspecialchars($relatorio['disciplina']) ?></strong>
                        — <?= $relatorio['progresso'] ?>%
                    </p>

                    <div class="barra">
                        <div
                            class="progresso"
                            style="width: <?= $relatorio['progresso'] ?>%"
                        ></div>
                    </div>

                    <p>
                        Respostas: <?= $relatorio['respostas'] ?>
                        | Acertos: <?= $relatorio['acertos'] ?>
                    </p>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

        <footer>
            &copy; <?= date('Y') ?> Thinking-Bot.
            Todos os direitos reservados.
        </footer>

    </main>

</body>
</html>
