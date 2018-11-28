<link rel="stylesheet" href="assets/vendor/front/bxSlider/jquery.bxslider.css">
<link rel="stylesheet" href="assets/front_end/css/inicio.css">
<script src="assets/vendor/front/bxSlider/jquery.bxslider.js"></script>
<script src="assets/front_end/js/inicio.js"></script>
<script rel="stylesheet" src="assets/charts/inicio.js"></script>

<div class="pusher">
    <div class="ui vertical masthead center aligned segment" id="header">

        <div class="ui container">
            <div class="ui large secondary inverted header menu">
                <a class="toc item">
                    <i class="sidebar icon"></i>
                </a>
                <a class="item" href="index">Início</a>
                <a class="item" href="sobre">Sobre</a>
                <?php if (isset($_COOKIE['login'])): ?>
                    <a  class="item" href="feed">
                        Feed
                    </a>
                    <a  class="item" href="crie">
                        Crie
                    </a>
                <?php endif; ?>
                <div class="right item">
                    <?php if (isset($_COOKIE['login'])): ?>
                        <a class="ui inverted button" href="perfil/<?=$_COOKIE['login']?>">
                            <?= $_COOKIE['login'] ?>
                        </a>
                        <a class="ui red inverted button" href="logout">Sair</a>
                    <?php else: ?>
                        <a href="login" class="ui inverted button">Login</a>
                        <a href="cadastro" class="ui inverted button">Cadastre-se</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="ui text container" id="titulo">
            <h1 class="ui inverted header">
                <img src="assets/files/img/logo.png">
            </h1>
            <h2>Plataforma de criação de gráficos a partir dos gastos públicos encontrados no <a href="http://www.portaltransparencia.gov.br/" target="_blank">portal da transparência</a>.</h2>
        </div>

    </div>
    <div class="ui vertical stripe segment">
        <div class="ui middle aligned stackable grid container">
            <div class="row">
                <div class="seven wide column">
                    <h3 class="ui header">Gastos nos Laboratórios Nacionais Agropecuários</h3>
                    <p id="legenda">
                        Gráfico sobre as despesas em agricultura nos Laboratórios Nacionais Agropecuários de:
                            <label  class="ui pink header es">MG</label>,
                            <label class="ui blue header es">PE</label>,
                            <label class="ui yellow header es">RS</label> e
                            <label class="ui teal header es">SP</label>.

                    </p>
                    <div class="ui statistics">
                        <div class="ui small statistic">
                            <div class="value">
                                R$30M
                            </div>
                            <div class="label">
                                MG
                            </div>
                        </div>
                        <div class="ui small statistic">
                            <div class="value">
                                R$12M
                            </div>
                            <div class="label">
                                PE
                            </div>
                        </div>
                        <div class="ui small statistic">
                            <div class="value">
                                R$12M
                            </div>
                            <div class="label">
                                RS
                            </div>
                        </div>
                        <div class="ui small statistic">
                            <div class="value">
                                R$31M
                            </div>
                            <div class="label">
                                SP
                            </div>
                        </div>
                    </div>

                </div>
                <div class="seven wide right floated column" id="grafico1">
                    <canvas id="chart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="ui vertical stripe segment">
        <div class="ui middle aligned stackable grid container">
            <div class="row">
                <div class="seven wide right column" id="grafico2">
                    <canvas id="chart2"></canvas>
                </div>
                <div class="seven wide column">
                    <h3 class="ui header">Gastos das Universidades Federais</h3>
                    <p id="legenda">
                        Gráfico sobre as despesas em educação nas Universidades Federais de:
                        <label  class="ui pink header es">Santa Catarina</label> e
                        <label class="ui blue header es">Paraná</label>.
                    </p>
                    <div class="ui statistics">
                        <div class="ui statistic">
                            <div class="value">
                                R$1.551M
                            </div>
                            <div class="label">
                                UFSC
                            </div>
                        </div>
                        <div class="ui statistic">
                            <div class="value">
                                R$1.450M
                            </div>
                            <div class="label">
                                UFPR
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ui vertical stripe segment">
        <div class="ui middle aligned stackable grid container">
            <div class="row">
                <div class="seven wide column">
                    <h3 class="ui header">Imprensa <i>vs</i> Estudos e Projetos</h3>
                    <p id="legenda">
                        Gráfico sobre a relação das despesas entre a
                            <label  class="ui pink header es">Financiadora de Estudos e Projetos</label> e o
                            <label class="ui blue header es">Fundo de Imprensa Nacional</label>.
                    </p>
                    <div class="ui statistics">
                        <div class="ui statistic">
                            <div class="value">
                                R$150M
                            </div>
                            <div class="label">
                                Estudos e Projetos
                            </div>
                        </div>
                        <div class="ui statistic">
                            <div class="value">
                                R$195M
                            </div>
                            <div class="label">
                                Imprensa Nacional
                            </div>
                        </div>
                    </div>
                </div>
                <div class="seven wide right floated column" id="grafico3">
                    <canvas id="chart3"></canvas>
                </div>
            </div>
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
