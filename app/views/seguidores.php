<link rel="stylesheet" href="assets/front_end/css/seguidores.css">
<link rel="stylesheet" href="assets/front_end/css/perfil.css">
<br><br><br><br><br><br>
<div class="ui container">
    <img id="borda" class="ui centered small circular image" src="assets/files/img/lazinha.jpg">
    <div class="ui top attached tabular menu">
        <a href="perfil" class="item">
            Perfil
        </a>
        <a href="graficos" class="item">
            Gráficos
        </a>
        <a href="seguidores" class="active item">
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
        <div class="ui three column grid">
            <?php foreach ($data['seguidores'] as $seguidor): ?>
                <div class="column">
                    <div class="ui centered card">
                        <div class="image">
                            <img src="<?= $seguidor['foto'] ?>">
                        </div>
                        <div class="content">
                            <a class="header"><?= $seguidor['nome'] ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<br>