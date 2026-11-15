
<?php require __DIR__ . '/partials/header.php'; ?>

<a class="voltar" href="index.php?acao=atividades">
    ← Voltar às atividades
</a>

<?php if ($atividadeSelecionada): ?>

    <section class="ficha">

        <div>
            <span class="eyebrow">FICHA DA ATIVIDADE</span>

            <h1>
                <?= htmlspecialchars($atividadeSelecionada['nome'], ENT_QUOTES, 'UTF-8') ?>
            </h1>

            <p class="subtitulo">
                <?= htmlspecialchars($atividadeSelecionada['descricao'], ENT_QUOTES, 'UTF-8') ?>
            </p>

            <dl>
                <dt>Disciplina</dt>
                <dd><?= htmlspecialchars($atividadeSelecionada['disciplina'], ENT_QUOTES, 'UTF-8') ?></dd>

                <dt>Ano escolar</dt>
                <dd><?= htmlspecialchars($atividadeSelecionada['ano'], ENT_QUOTES, 'UTF-8') ?></dd>

                <dt>Professor</dt>
                <dd><?= htmlspecialchars($atividadeSelecionada['professor'], ENT_QUOTES, 'UTF-8') ?></dd>

                <dt>Estado</dt>
                <dd><?= htmlspecialchars($atividadeSelecionada['estado'], ENT_QUOTES, 'UTF-8') ?></dd>
            </dl>
        </div>

    </section>

<?php else: ?>

    <p class="vazio">Atividade não encontrada.</p>

<?php endif; ?>

<?php require __DIR__ . '/partials/footer.php'; ?>
