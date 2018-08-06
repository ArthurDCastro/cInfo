<link rel="stylesheet" href="assets/front_end/css/perfil.css">
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
            Perfil
        </a>
        <a id="graficos" class="item">
            Gráficos
        </a>
        <a id="seguidores" class="item">
            Seguidores
        </a>
        <a  id="seguindo" class="item">
            Seguindo
        </a>
        <a id="editar" class="item">
            Editar
        </a>
    </div>
    <div class="ui bottom attached segment">
        <div class="ui three column grid" id="conteudo">

        </div>
    </div>
    <!--<img class="ui small circular image" src="assets/files/img/lazinha.jpg" style="position: absolute; margin-left: 43.15%; margin-top: -7.5%; border: 2px;">-->
</div>

<br>