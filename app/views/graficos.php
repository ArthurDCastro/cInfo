<link rel="stylesheet" href="assets/front_end/css/graficos.css">

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

                <div class="ui centered card">
                    <div class="image">
                        <img src="assets/files/img/g_pizza.png" alt="">
                    </div>
                    <div class="content">
                        <div class="ui center aligned header"><?= $grafico->getTitulo() ?></div>
                    </div>
                    <div class="extra content">
                        <span class="left floated">Criado em: <?= $grafico->getData() ?></span>
                    </div>
                    <div class="extra content">
                        <span class="left floated">Feito por: <?= $grafico->getUser() ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>