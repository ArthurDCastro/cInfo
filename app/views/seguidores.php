<link rel="stylesheet" href="assets/front_end/css/seguidores.css">

<div id="conteudo">
    <div id="cards" class="ui link cards">
        <?php foreach ($data['seguidores'] as $seguidor): ?>
            <div class="ui centered card">
                <div class="image">
                    <img src="<?= $seguidor['foto'] ?>">
                </div>
                <div class="content">
                    <a class="header"><?= $seguidor['nome'] ?></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
