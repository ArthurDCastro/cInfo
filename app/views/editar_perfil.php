<div class="ui form">
    <div class="two fields">
        <div class=" left floated column" style="margin-top: 4%; margin-bottom: 2%; margin-left: 20%">
            <form action="editar_perfil" method="post" id="form1">
                <label><b>Nome</b></label>
                <br>
                <div class="ui left icon input">
                    <i class="user icon"></i>
                    <input type="text" name="nome" value="<?= $user->getNome() ?>" style="width: 100%">
                </div>
                <br><br>
                <label><b>Email</b></label>
                <br>
                <div class="ui left icon input">
                    <i class="mail icon"></i>
                    <input type="text" name="email" value="<?= $user->getEmail() ?>" style="width: 100%">
                </div>
                <br><br>
                <label><b>Nova Senha</b></label>
                <br>
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input type="text" name="senha" placeholder="*****" style="width: 100%">
                </div>
                <br><br><br>
                <button name="cancelar" class="ui animated red large submit button" tabindex="0">
                    <div class="visible content">Cancelar</div>
                    <div class="hidden content">
                        <i class="cancel icon"></i>
                    </div>
                </button>
            </div>
            <div class="right floated column" style="margin-top: 4%; margin-bottom: 2%; margin-left: 25%">
                <label><b>Nome de Usuário</b></label>
                <br>
                <div class="ui left icon input">
                    <i class="unhide icon"></i>
                    <input type="text" form="form1" name="login" value="<?= $user->getLogin() ?>" style="width: 100%">
                </div>
                <br><br>
                <label><b>Senha Antiga</b></label>
                <br>
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input type="text" name="senha_antiga" form="form1" placeholder="*****" style="width: 100%">
                </div>
                <br><br>
                <label><b>Confirme a Senha</b></label>
                <br>
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input type="text" name="senha_confirmada" form="form1" placeholder="*****" style="width: 100%">
                </div>
                <br><br><br>
                <button name="salvar" form="form1" type="submit"  class="ui animated green large submit button" tabindex="0">
                    <div class="visible content">Salvar</div>
                    <div class="hidden content">
                        <i class="upload icon"></i>
                    </div>
                </button>
            </form>
        </div>
    </div>
</div>
