<script type="text/javascript" src="../../assets/front_end/js/grafico_individual.js"></script>
<div id="teste">
                <h1 class="ui header">
                    <i class="pie chart icon"></i>
                    <div class="content">
                        <?= $grafico->getTitulo() ?>
                        <div class="sub header"><?= $grafico->getData() ?></div>
                    </div>
                </h1>
    <?php foreach ($grafico->getDados() as $dados): ?>
                <div class="ui small statistic">
                    <div class="label">
                        <?= $dados->getNome() ?>
                    </div>
                    <div class="value">
                        R$ <?= number_format((float) $dados->getGasto(), 2, ',', '.'); ?>
                    </div>
                </div>
    <?php endforeach; ?>

</div>
