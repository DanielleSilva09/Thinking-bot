
<?php

header('Content-Type: application/json; charset=utf-8');

$rota = $_GET['rota'] ?? '';

switch ($rota) {
    case 'atividades':
        $atividades = require __DIR__ . '/../app/data/atividades.php';

        echo json_encode($atividades, JSON_UNESCAPED_UNICODE);
        break;

    default:
        http_response_code(404);

        echo json_encode(
            ['erro' => 'Rota não encontrada'],
            JSON_UNESCAPED_UNICODE
        );
}
