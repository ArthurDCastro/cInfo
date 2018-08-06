<link rel="stylesheet" href="assets/front_end/css/perfil.css">
<link rel="stylesheet" href="assets/vendor/front/semantic/components/button.css">

<script type="text/javascript" src="assets/front_end/js/perfil.js"></script>

<br><br><br><br><br><br>

<div class="ui container">
    <?php if ( isset( $data['foto'])): ?>
        <img id="borda" class="ui centered small circular image" src="<?= $data['foto'] ?>">
    <?php else: ?>
        <div id="borda" class="ui centered small circular image blurring dimmable">
            <div class="ui dimmer">
                <div class="content">
                    <div class="center">
                        <form id="fileinfo" action="addFoto" method="post" enctype="multipart/form-data">
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" id="submit">
                        </form>

                        <div class="ui inverted button" id="input_foto">Add Foto</div>
                    </div>
                </div>
            </div>
            <img src="assets/files/img/image.png">
        </div>
    <?php endif; ?>
    <div class="ui top attached tabular menu">
        <a id="perfil" class="active item">
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
                    2,204
                </div>
                <div class="label">
                    Gráficos
                </div>
            </div>
        </a>
        <a id="seguidores" class="item">
            <div class="ui mini horizontal statistic">
                <div class="value">
                    2,204
                </div>
                <div class="label">
                    Seguidores
                </div>
            </div>
        </a>
        <a  id="seguindo" class="item">
            <div class="ui mini horizontal statistic">
                <div class="value">
                    2,204
                </div>
                <div class="label">
                    Seguindo
                </div>
            </div>
        </a>
        <?php if ($data['user']->getLogin() == $_COOKIE['login']): ?>
            <a id="editar" class="item">
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
            <?php include 'perfil_usuario.php'?>
        </div>
    </div>
</div>

<div id="user"><?= $data['user']->getLogin(); ?></div>

<br>