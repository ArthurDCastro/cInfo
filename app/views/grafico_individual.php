<script type="text/javascript">
    $(document).ready(function() {

        $('#oculta').hide();


        var quantia1 = [];
        var dado1 = [];



        $('.quantia').each(function(){
            quantia1.push($(this).text());
        });

        $('.dado').each(function(){
            dado1.push($(this).text());
        });
        var ctx = document.getElementById('chart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',

            data: {
                datasets: [{
                    data: quantia1,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',

                        'rgba(105, 255, 221, 0.8)',
                        'rgba(92, 78, 232, 0.8)',
                        'rgba(232, 176, 78, 0.8)',
                        'rgba(180, 255, 86, 0.8)',

                        'rgba(246, 211, 62, 0.8)',
                        'rgba(38, 212, 46, 0.8)',
                        'rgba(164, 38, 212, 0.8)',
                        'rgba(246, 100, 44, 0.8)',

                        'rgba(140, 92, 255, 0.8)',
                        'rgba(232, 75, 67, 0.8)',
                        'rgba(114, 232, 67, 0.8)',
                        'rgba(73, 228, 255, 0.8)'

                    ],
                    borderWidth: 0
                }],
                labels: dado1
            }
        });

        Chart.defaults.global.legend.display = true;
        Chart.defaults.global.tooltips.enabled = true;

    });
</script>
<link rel="stylesheet" href="assets/vendor/front/bxSlider/jquery.bxslider.css">
<script src="assets/vendor/front/bxSlider/jquery.bxslider.js"></script>

<div id="teste" style="margin-bottom: 3rem">
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
    <div class="ui statistics">
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