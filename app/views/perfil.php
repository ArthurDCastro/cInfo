<link rel="stylesheet" href="assets/front_end/css/perfil.css">
<link rel="stylesheet" href="assets/vendor/front/semantic/components/button.css">
<?php
    $verificaEditar = false;
    if (isset($data['url'][1])):
        if ($data['url'][1] == 'editar_perfil'):
            $verificaEditar = true;
        endif;
    endif;
?>
<script type="text/javascript" src="assets/front_end/js/perfil.js"></script>
    <div id="trap"><br><br>
        <?php if ($data['foto'] != '' and $data['user']->getLogin() != $_COOKIE['login']): ?>
            <img id="borda" class="ui centered small circular image" src="<?= $data['foto'] ?>">
        <?php elseif ($data['user']->getLogin() == $_COOKIE['login']): ?>
            <div id="borda" class="ui centered small circular image blurring dimmable">
                <div class="ui dimmer">
                    <div class="content">
                        <div class="center">
                            <form id="fileinfo" action="addFoto" method="post" enctype="multipart/form-data">
                                <input type="file" name="fileToUpload" id="fileToUpload">
                                <input type="submit" id="submit">
                            </form>
                            <?php if (isset( $data['foto'])): ?>
                                <div class="ui inverted button" id="input_foto">Editar Foto</div>
                            <?php else: ?>
                                <div class="ui inverted button" id="input_foto">Add Foto</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if ($data['foto'] != ''): ?>
                    <img src="<?= $data['foto'] ?>">
                <?php else: ?>
                    <img src="assets/files/img/image.png">
                <?php endif; ?>
            </div>
        <?php else: ?>
            <img id="borda" class="ui centered small circular image" src="assets/files/img/image.png">
        <?php endif; ?>
    </div>
    <div class="ui container">
    <div class="ui header">
        <h1 class="ui left floated blue header" style="width: 100%">
            <p id="user">
                <?= $data['user']->getLogin(); ?>
            </p>
            <?php if ($data['user']->getLogin() != $_COOKIE['login']): ?>
                <?php if($data['relacao']->getSeguidor()->getLogin() != '' and $data['relacao']->getDtf() == ''): ?>
                    <button id='seguir' class="ui right floated blue circular button" value="unfollow">Seguindo</button>
                <?php else: ?>
                    <button id="seguir" class="ui right floated blue circular basic button" value="follow">Seguir</button>
                <?php endif;?>
            <?php endif; ?>
        </h1>
        <div class="sub header"><?= $data['user']->getBio() ?></div>
    </div>
    <div class="ui top attached tabular menu">
        <a id="perfil" class="<?php if(!$verificaEditar): echo 'active'; endif;?> item">
            <div class="ui mini horizontal statistic">
                <div class="value"></div>
                <div class="label">
                    Perfil
                </div>
            </div>
        </a>
        <a id="graficos" class="item">
            <div class="ui mini horizontal statistic">
                <div class="value">
                    <?= count($data['graficos']) ?>
                </div>
                <div class="label">
                    Gráficos
                </div>
            </div>
        </a>
        <a id="seguidores" class="item">
            <div class="ui mini horizontal statistic">
                <div class="value">
                    <?= count($data['seguidores']) ?>
                </div>
                <div class="label">
                    Seguidores
                </div>
            </div>
        </a>
        <a  id="seguindo" class="item">
            <div class="ui mini horizontal statistic">
                <div class="value">
                    <?= count($data['seguindo']) ?>
                </div>
                <div class="label">
                    Seguindo
                </div>
            </div>
        </a>
        <?php if ($data['user']->getLogin() == $_COOKIE['login']): ?>
            <a id="editar" class="<?php if($verificaEditar): echo 'active'; endif;?> item">
                <div class="ui mini horizontal statistic">
                    <div class="value"></div>
                    <div class="label">
                        Editar
                    </div>
                </div>
            </a>
        <?php endif; ?>
    </div>
    <div class="ui bottom attached segment">
        <div id="conteudo">
            <?php
                if ($verificaEditar):
                    include 'editar_perfil.php';
                else:
                    include 'perfil_usuario.php';
                endif;
            ?>
        </div>
    </div>
</div>
<br>
<script>
    <?php if (isset($data['url'][1])): if ($data['url'][1] == 'erro_img'):?>
    $(document).ready(function() {
        $('#modal_excluir').modal('show');
    });
    <?php endif; endif; ?>
</script>
<!-- modal img-->
<div class="ui basic modal" id="modal_excluir">
    <div class="ui icon header">
        <i class="image alternate outline icon"></i>
        Imagem inválida!
    </div>
    <div class="content">
        <p >Você selecionou um tipo de arquivo inválido, uma imagem muito grande ou não conseguimos salva-la.</p>
    </div>
    <div class="actions">
        <div class="ui red basic cancel inverted button">
            <i class="remove icon"></i>
            Ok
        </div>
    </div>
</div>


