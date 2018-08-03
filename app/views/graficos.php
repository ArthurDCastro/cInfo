<link rel="stylesheet" href="assets/front_end/css/graficos.css">
<link rel="stylesheet" href="assets/front_end/css/perfil.css">
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
    <link rel="stylesheet" href="assets/front_end/css/perfil.css">

    <div class="ui container" id="">
        <img id="borda" class="ui centered small circular image" src="assets/files/img/lazinha.jpg">
        <div class="ui top attached tabular menu">
            <a href="perfil" class="item">
                Perfil
            </a>
            <a href="graficos" class="active item">
                Gráficos
            </a>
            <a href="seguidores" class="item">
                Seguidores
            </a>
            <a href="seguindo" class="item">
                Seguindo
            </a>
            <a href="editar" class="item">
                Editar
            </a>
        </div>
        <div class="ui bottom attached segment">
            <div class="ui link cards" id="cards">
                <?php foreach ($data['graficos'] as $grafico): ?>
                    <div class="ui centered card">
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

            <?php endif; ?>
        </div>
    </div>
<br>