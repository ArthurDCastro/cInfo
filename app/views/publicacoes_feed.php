<?php if (count($data['publicacoes']) > 0): ?>
    <div class="ui feed">
        <?php foreach ($data['publicacoes'] as $publicacao): $foto = $publicacao->getUser()->getFoto();?>
            <div class="event">
                <div class="label">
                    <?php if ($foto != ''): ?>
                        <img src="<?= $publicacao->getUser()->getFoto() ?>">
                    <?php else: ?>
                        <img src="assets/files/img/image.png">
                    <?php endif; ?>
                </div>
                <div class="content">
                    <div class="summary">
                        <a href="perfil/<?= $publicacao->getUser()->getLogin() ?>"><?= $publicacao->getUser()->getLogin() ?></a>
                        <div class="date">
                            <?= $publicacao->getData(); ?>
                        </div>
                    </div>
                    <div id="<?= $publicacao->getGrafico()->getCodigo() ?>"  class="extra text grafico">
                        <?= $publicacao->getDescricao(); ?>
                        <div class="info">
                            <div id="tipo-<?= $publicacao->getGrafico()->getCodigo() ?>"><?= $publicacao->getGrafico()->getTipo() ?></div>
                            <?php foreach ($publicacao->getGrafico()->getDados() as $dado): ?>
                                <div class="nome"><?= $dado->getNome()?></div>
                                <div class="gasto"><?= $dado->getGasto()?></div>
                            <?php endforeach; ?>
                        </div>
                        <canvas id="chart-<?= $publicacao->getGrafico()->getCodigo() ?>"></canvas>
                    </div>
                    <div class="meta">
                        <?php $verificaLike = false; foreach ($publicacao->getLike() as $likes): if ($likes == $_COOKIE['login']): $verificaLike = true; endif; endforeach; ?>
                        <?php if ($verificaLike): ?>
                            <a class="like active like-post" id="unlike-<?= $publicacao->getCodigo() ?>">
                                <i class="like icon"></i><?= count($publicacao->getLike()) ?>
                            </a>
                        <?php else: ?>
                            <a class="like like-post" id="like-<?= $publicacao->getCodigo() ?>">
                                <i class="like icon"></i><?= count($publicacao->getLike()) ?>
                            </a>
                        <?php endif; ?>
                        <a class="comments comentarios" id="<?= $publicacao->getCodigo(); ?>">
                            <i class="comments icon"></i><?= count($publicacao->getComentarios()) ?>
                        </a>
                    </div>
                    <div class="ui cookie nag comentarios" style="z-index: inherit" id="comen-<?= $publicacao->getCodigo(); ?>">
                        <i class="close icon black"></i>
                        <div class="ui small comments">
                            <h4 class="ui dividing header">Comentários</h4>
                            <div id="todos_comen-<?= $publicacao->getCodigo(); ?>">
                                    <?php foreach ($publicacao->getComentarios() as $comentario): $foto = $comentario->getUser()->getFoto()?>
                                    <div class="comment">
                                        <a class="avatar">
                                            <?php if ($foto != ''): ?>
                                                <img src="<?= $comentario->getUser()->getFoto() ?>" style=" height: auto">
                                            <?php else: ?>
                                                <img src="assets/files/img/image.png" style=" height: auto">
                                            <?php endif; ?>
                                        </a>
                                        <div class="content">
                                            <a class="author"><?= $comentario->getUser()->getLogin() ?></a>
                                            <div class="metadata">
                                                <span class="date"><?= $comentario->getData() ?></span>
                                            </div>
                                            <div class="text">
                                                <?= $comentario->getComentario() ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <form class="ui reply form">
                                <div class="field">
                                    <textarea id="text-<?= $publicacao->getCodigo(); ?>" rows="2"></textarea>
                                </div>
                                <div class="ui blue labeled submit icon button add_coment" id="add-<?= $publicacao->getCodigo(); ?>">
                                    <i class="icon edit"></i> Add Comentário
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
<?php else: ?>
    <br>
    <div class="ui middle aligned center aligned grid" id="div1">
        <div class="ui container">

            <div class="ui warning message">
                <div class="header">
                    Sem postagens
                </div>
                <p>Ops, seus seguidores ainda não postaram nenhum gráfico...</p>
            </div>
        </div>
    </div>
    <br>
<?php endif; ?>