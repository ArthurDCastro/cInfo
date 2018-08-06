<link rel="stylesheet" href="assets/front_end/css/seguidores.css">

<div id="conteudo">
    <div id="cards" class="ui link cards">
        <?php foreach ($segue as $s): ?>
            <div class="ui centered card seguindo">
                <div class="image">
                </div>
                <div class="content">
                    <a href="perfil/<?= $s->getSeguindo()->getLogin() ?>" class="header"><?= $s->getSeguindo()->getLogin()   ?></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
