<script type="text/javascript" src="assets/front_end/js/editar_perfil.js"></script>
<form action="editar_perfil" class="ui form" method="post" id="form1">
    <div class="ui equal width form" style="margin: 3% 7% 7% 7%;">
        <div class="fields">
            <div class="field">
                <label>Nome</label>
                <div class="ui left icon input">
                    <i class="user icon"></i>
                    <input type="text" name="nome" form="form1" value="<?= $data['user']->getNome() ?>">
                </div>
            </div>
            <div class="field">
                <label>Email</label>
                <div class="ui left icon input">
                    <i class="mail icon"></i>
                    <input type="text" name="email" value="<?= $data['user']->getEmail() ?>">
                </div>
            </div>
        </div>
        <div class="fields">
            <div class="field">
                <label>Senha Antiga</label>
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input name="password" type="password" placeholder="*****">
                </div>
            </div>
            <div class="field">
                <label>Nova Senha</label>
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input name="senha_nova" type="password" placeholder="*****">
                </div>
            </div>
            <div class="field">
                <label>Confirme a Nova Senha</label>
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input name="senha_confirmada" type="password" placeholder="*****">
                </div>
            </div>
        </div>
        <div class="field">
            <label>Biografia</label>
            <textarea name="bio" rows="2"><?= $data['user']->getBio() ?></textarea>
        </div>
        <?php if (isset($_POST['erro'])): ?>
            <div class="ui negative message">
                <p>
                    <?= $_POST['erro'] ?>
                </p>
            </div>
        <?php endif;?>
        <div class="ui error message"></div>
        <button id="enviar_editar" name="salvar" form="form1" type="submit" class="ui animated green large submit button" value="cadastrar" tabindex="0" style="float: right;">
            <div class="visible content">Salvar</div>
            <div class="hidden content">
                <i class="upload icon"></i>
            </div>
        </button>
        <button name="cancelar" class="ui animated red large submit button" tabindex="0" style="float: right;">
            <div class="visible content">Cancelar</div>
            <div class="hidden content">
                <i class="cancel icon"></i>
            </div>
        </button>
    </div>
</form>

<?php if (isset($error)): ?>
    <div class="ui negative message">
        <p>
            <?= $error ?>
        </p>
    </div>
<?php endif; ?>

