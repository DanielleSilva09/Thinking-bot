
<?php

$acao = $_GET['acao'] ?? 'inicio';

require_once __DIR__ . '/../app/controllers/AtividadeControle.php';

$controller = new AtividadeControle();

switch ($acao) {
    case 'inicio':
        $controller->inicio();
        break;

    case 'atividades':
        $controller->listar();
        break;

    case 'detalhe':
        $controller->detalhes();
        break;

    default:
        http_response_code(404);
        echo 'Página não encontrada!';
}
