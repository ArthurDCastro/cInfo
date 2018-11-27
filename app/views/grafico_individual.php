<script type="text/javascript" src="assets/front_end/js/grafico_individual.js"></script>
<link rel="stylesheet" href="assets/vendor/front/bxSlider/jquery.bxslider.css">
<script src="assets/vendor/front/bxSlider/jquery.bxslider.js"></script>

<div id="teste">
                <h1 class="ui header">
                    <i class="pie chart icon"></i>
                    <div class="content">
                        <?= $grafico->getTitulo() ?>
                        <div class="sub header"><?= $grafico->getData() ?></div>
                    </div>
                </h1>

    <div class="seven wide right floated column" id="grafico1">
        <canvas id="chart"></canvas>
    </div>

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

    <div id="oculta">
        <ul id="dado">Titulo: <?= $grafico->getTitulo()  ?>
            <?php foreach ($grafico->getDados() as $dados): ?>
                <li class="dado"><?= $dados->getNome() ?></li>
            <?php endforeach; ?>
        </ul>
        <ul id="quantia">
            <?php foreach ($grafico->getDados() as $dados): ?>
                <li class="quantia"><?= $dados->getGasto(); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

</div>
