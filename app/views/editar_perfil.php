<form class="ui form" method="post" id="form1">
    <div class="ui equal width form" style="margin: 3% 7% 7% 7%;">
        <div class="fields">
            <div class="field">
                <label>Nome</label>
                <div class="ui left icon input">
                    <i class="user icon"></i>
                    <input type="text" name="nome" form="form1" value="<?= $user->getNome() ?>">
                </div>
            </div>
            <div class="field">
                <label>Email</label>
                <div class="ui left icon input">
                    <i class="mail icon"></i>
                    <input type="text" name="email" value="<?= $user->getEmail() ?>">
                </div>
            </div>
        </div>
        <div class="fields">
            <div class="field">
                <label>Senha Antiga</label>
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input name="senha_antiga" type="password" placeholder="*****">
                </div>
            </div>
            <div class="field">
                <label>Nova Senha</label>
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input name="senha" type="password" placeholder="*****">
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
            <textarea name="bio" rows="2"></textarea>
        </div>
        <button name="salvar" form="form1" type="submit" class="ui animated green large submit button" tabindex="0" style="float: right;">
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

