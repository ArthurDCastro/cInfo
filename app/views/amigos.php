<link rel="stylesheet" href="assets/front_end/css/amigos.css">

<div class="ui segment" id="article">
    <div class="ui three column grid">
        <?php foreach ($data['amigos'] as $amigo): ?>
            <div class="column">
                <div class="ui fluid card">
                    <div class="image">
                        <img src="<?= $amigo['foto'] ?>">
                    </div>
                    <div class="content">
                        <a class="header"><?= $amigo['nome'] ?></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>