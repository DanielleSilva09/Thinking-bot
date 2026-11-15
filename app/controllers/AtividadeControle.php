
<?php

class AtividadeControle {

    private function dados(): array {
        return require __DIR__ . '/../data/atividades.php';
    }

    public function inicio(): void {
        $titulo = 'Thinking-Bot';

        require __DIR__ . '/../../public/views/inicio.php';
    }

    public function listar(): void {
        $titulo = 'Atividades';

        $atividades = $this->dados();

        $pesquisa = trim($_GET['q'] ?? '');

        if ($pesquisa !== '') {
            $atividades = array_filter(
                $atividades,
                function ($atividade) use ($pesquisa) {
                    return stripos($atividade['nome'], $pesquisa) !== false
                        || stripos($atividade['disciplina'], $pesquisa) !== false;
                }
            );
        }

        require __DIR__ . '/../../public/views/atividades.php';
    }

    public function detalhes(): void {
        $titulo = 'Detalhes da Atividade';

        $id = (int) ($_GET['id'] ?? 0);

        $atividadeSelecionada = null;

        foreach ($this->dados() as $atividade) {
            if ($atividade['id'] === $id) {
                $atividadeSelecionada = $atividade;
                break;
            }
        }

        require __DIR__ . '/../../public/views/detalhes.php';
    }
}
