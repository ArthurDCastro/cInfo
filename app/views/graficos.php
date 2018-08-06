<link rel="stylesheet" href="assets/front_end/css/graficos.css">
<script type="text/javascript" src="assets/front_end/js/perfil.js"></script>

<?php  if (!isset($graficos)): ?>
    <div class="ui middle aligned center aligned grid">
        <div class="ui container" id="erro">
            <div class="ui negative message">
                <div class="header">
                    Ops você ainda não tem gráficos...
                </div>
                <p>Crie seus gráficos <b><a href="crie" id="darkred"">aqui</a></b></p>
            </div>
        </div>
    </div>
<?php else: ?>
    <div id="conteudo">
        <div class="ui link cards" id="cards">
            <?php foreach ($graficos as $grafico): ?>
                <div id="<?= $grafico->getCodigo() ?>" class="ui centered card grafico">
                    <a id="excluir" class="ui corner red label">
                        <i class="remove icon"></i>
                    </a>
                    <div class="info">
                        <div id="tipo-<?= $grafico->getCodigo() ?>"><?= $grafico->getTipo() ?></div>
                        <?php foreach ($grafico->getDados() as $dado): ?>
                            <div class="nome"><?= $dado['nome']?></div>
                            <div class="gasto"><?= $dado['gasto']?></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="image" style="padding: 15px">
                        <canvas id="grafico-<?= $grafico->getCodigo() ?>" width="100" height="100"></canvas>
                    </div>
                    <div class="content">
                        <div class="header"><?= $grafico->getTitulo() ?></div>
                        <div class="meta">
                            <span class="date">Criado em: <?= $grafico->getData() ?></span>
                        </div>
                    </div>
                    <div class="extra content">
                        <a>
                            <i class="users icon"></i>
                            <?= $grafico->getUser() ?>
                        </a>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<script>
    $(document).ready(function() {
        $('.info').hide();

        $('.grafico').each(function () {

            var dados = [];

            var id = $(this).attr('id');

            for (i in $('#' + id).find('.gasto')) {
                var g = $('#' + id).find('.gasto').eq(i).text();
                if ( g.length > 1){
                    dados.push($('#' + id).find('.gasto').eq(i).text());
                }

            }

            var d = [dados[0], dados[1]];


            var label = [];
            for (i in $('#' + id).find('.nome')) {
                var n = $('#' + id).find('.nome').eq(i).text();
                if ( n.length > 1) {
                    label.push($('#' + id).find('.nome').eq(i).text());
                }
            }

            var ctx = document.getElementById('grafico-' + id).getContext('2d');
            var myChart = new Chart(ctx, {
                type: $('#tipo-' + id).text(),
                data: {
                    datasets: [{
                        data: d,
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
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 0
                    }],
                    labels: label
                },
                title: {
                    display: true,
                    position: 'top',
                    text: 'olhai'
                }

            });
        });
    });
</script>
