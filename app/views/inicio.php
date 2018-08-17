<link rel="stylesheet" href="assets/vendor/front/bxSlider/jquery.bxslider.css">
<link rel="stylesheet" href="assets/front_end/css/inicio.css">
<script src="assets/vendor/front/bxSlider/jquery.bxslider.js"></script>
<script src="assets/front_end/js/inicio.js"></script>
<script rel="stylesheet" src="assets/charts/inicio.js"></script>

<!--TODO graficos principais no carroussel-->

<div style="margin-top: 110px"></div>
<div class="ui two column centered grid" style="padding: 0% 4%">
    <div class="column" id="corpo" style="width: 2002px">
        <ul class="bxslider">
            <li class="black" style="height: 550px; position: relative">
                <div id="todo">
                    <div id="grafico1" class="ui container" >
                       <b><p id="legenda">Gráfico comparando gastos em educação da<label class="ui pink header">UFSC</label> e da<label class="ui blue header">UFPR</label>.</p></b>
                            <canvas id="chart"></canvas>
                    </div>
                </div>
            </li>
            <li class="black" style="height: 550px; position: relative">
                <p id="legenda">
                    <b>Gráfico sobre as despesas em agricultura nos Laboratórios Nacionais Agropecuarios de:
                    <label  class="ui pink header es">MG</label>,
                    <label class="ui blue header es">PE</label>,
                    <label class="ui yellow header es">RS</label> e
                    <label class="ui teal header es">SP</label>.
                    </b>
                </p>
                <div id="grafico2" class="ui container" >
                    <canvas id="chart2"></canvas>
                </div>

            </li>
            //esse gráfico não está funcionando por estar na terceira parte do carrosel pq ele esta sendo construido e exibido

            <li class="black" style="height: 550px; position: relative">
                <p id="legenda">
                    <b>Gráfico sobre as despesas dos Institutos Federais Catarinenses em:
                        <label  class="ui pink header es">Araquari</label>,
                        <label class="ui blue header es">Blumenau</label>,
                        <label class="ui yellow header es">Camboriu</label> e
                        <label class="ui teal header es">São Francisco do Sul</label>.
                    </b>
                </p>
                <div id="grafico3" class="ui container" >
                    <canvas id="chart3"></canvas>
                </div>
            </li>
            <li class="black" style="height: 550px; position: relative">
                <div class="container">
                    <img src="../../assets/files/img/castrinho.jpg.png" style="width: 100%">
                </div>
            </li>
        </ul>
<!--        <div class="ui three column grid" style="margin: 0 10px 10px 10px">-->
<!--            <div class="column">-->
<!--                <div class="ui green fluid card">-->
<!--                    <div class="content">-->
<!--                        <div class="header">-->
<!--                            <i class="arrow up icon"></i>-->
<!--                            R$20,00-->
<!--                        </div>-->
<!--                        <div class="description">-->
<!--                            Arrecadação - R$3000 (10%)-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="ui bottom attached button">-->
<!--                        <i class="add icon"></i>-->
<!--                        Mais informações-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="column">-->
<!--                <div class="ui red fluid card">-->
<!--                    <div class="content">-->
<!--                        <div class="header centered">-->
<!--                            <i class="arrow down icon"></i>-->
<!--                            R$20,00-->
<!--                        </div>-->
<!--                        <div class="description">-->
<!--                            Despesas totais - R$3000 (10%)-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="ui bottom attached button">-->
<!--                        <i class="add icon"></i>-->
<!--                        Mais informações-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="column">-->
<!--                <div class="ui inverted yellow fluid card">-->
<!--                    <div class="content">-->
<!--                        <div class="header">R$20,00</div>-->
<!--                        <div class="description">-->
<!--                            Divida Pública - R$3000 (10%)-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="ui bottom attached button">-->
<!--                        <i class="add icon"></i>-->
<!--                        Mais informações-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
</div>
<div id="oculta">
    <ul id="dado">Titulo: <?= $data['grafico']->getTitulo() ?>
            <?php foreach ($data['grafico']->getDados() as $dados): ?>
                <li class="dado"><?= $dados->getNome() ?></li>
            <?php endforeach; ?>
    </ul>
    <ul id="quantia">
        <?php foreach ($data['grafico']->getDados() as $dados): ?>
            <li class="quantia"><?= $dados->getGasto(); ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<div id="oculta2">
    <ul id="dado">Titulo: <?= $data['grafico2']->getTitulo() ?>
        <?php foreach ($data['grafico2']->getDados() as $dados): ?>
            <li class="dado2"><?= $dados->getNome() ?></li>
        <?php endforeach; ?>
    </ul>
    <ul id="quantia">
        <?php foreach ($data['grafico2']->getDados() as $dados): ?>
            <li class="quantia2"><?= $dados->getGasto(); ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<div id="oculta3">
    <ul id="dado">Titulo: <?= $data['grafico3']->getTitulo() ?>
        <?php foreach ($data['grafico3']->getDados() as $dados): ?>
            <li class="dado3"><?= $dados->getNome() ?></li>
        <?php endforeach; ?>
    </ul>
    <ul id="quantia">
        <?php foreach ($data['grafico3']->getDados() as $dados): ?>
            <li class="quantia3"><?= $dados->getGasto(); ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<br>
