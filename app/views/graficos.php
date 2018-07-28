<link rel="stylesheet" href="assets/front_end/css/graficos.css">
<br><br><br><br><br><br>
<?php  if (!isset($data['graficos'])): ?>

<div class="ui middle aligned center aligned grid" id="article">
    <div class="ui container">
        <div class="ui negative message">
            <div class="header">
                Ops você ainda não tem gráficos...
            </div>
            <p>Crie seus gráficos <b><a href="crie" style="color: darkred;">aqui</a></b></p>
        </div>
    </div>
</div>

<?php else: ?>
    <div class="ui  segment" id="fora">
        <div class="ui link cards" id="cards">
            <?php foreach ($data['graficos'] as $grafico): ?>
                 <div class="card column" id="card">
                    <div class="image">
                        <img src="assets/files/img/g_pizza.png">
                    </div>
                    <div class="content">
                        <div class="header"><?= $grafico['nome'] ?></div>
                    </div>
                    <div class="extra content">
                        <span class="right floated">Criado em: <?= $grafico['data'] ?></span>
                        <span>Feito por: <?= $grafico['user'] ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
<br><br>
