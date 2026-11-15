
<?php require __DIR__ . '/partials/header.php'; ?>

<div class="cabecalho">
    <div>
        <span class="eyebrow">THINKING-BOT · ATIVIDADES</span>

        <h1>Atividades disponíveis</h1>

        <p>Pesquisa por nome ou disciplina.</p>
    </div>
</div>

<form class="pesquisa" method="get" action="index.php">
    <input type="hidden" name="acao" value="atividades">

    <input
        type="search"
        name="q"
        placeholder="Pesquisar atividade ou disciplina..."
        value="<?= htmlspecialchars($pesquisa, ENT_QUOTES, 'UTF-8') ?>"
    >

    <button type="submit">Pesquisar</button>
</form>

<p class="contador">
    <?= count($atividades) ?> atividade(s) encontrada(s)
</p>

<div class="grelha">

    <?php foreach ($atividades as $atividade): ?>

        <article class="cartaz">

            <span class="wanted">ATIVIDADE</span>

            <h2>
                <?= htmlspecialchars($atividade['nome'], ENT_QUOTES, 'UTF-8') ?>
            </h2>

            <p>
                <?= htmlspecialchars($atividade['disciplina'], ENT_QUOTES, 'UTF-8') ?>
            </p>

            <div class="recompensa">
                <?= htmlspecialchars($atividade['ano'], ENT_QUOTES, 'UTF-8') ?>
            </div>

            <a href="index.php?acao=detalhe&amp;id=<?= (int) $atividade['id'] ?>">
                Consultar ficha →
            </a>

        </article>

    <?php endforeach; ?>

</div>

<?php if (!$atividades): ?>
    <p class="vazio">
        Não foram encontradas atividades. Experimenta outra pesquisa.
    </p>
<?php endif; ?>

<?php require __DIR__ . '/partials/footer.php'; ?>
