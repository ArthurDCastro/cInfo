
    <link rel="stylesheet" href="assets/vendor/front/semantic/semantic.css">
    <link rel="stylesheet" href="assets/front_end/css/login.css">
    <link rel="stylesheet" href="assets/vendor/front/semantic/components/dropdown.css">

    <script type="text/javascript" src="assets/vendor/front/semantic/components/form.js"></script>
    <script type="text/javascript" src="assets/vendor/front/semantic/components/dropdown.js"></script>

    <meta charset="UTF-8">
</head>
<body>
<div class="ui center aligned grid" id="menu">
    <div class="ten wide column centered">
        <a href="index" id="logo">
            <img class="middle aligned" src="assets/files/img/logo.png" style="">
        </a>
    </div>
</div>

<div class="ui center aligned grid" id="login">
    <div class="column">
        <br><br>
        <form class="ui large form" action="login" method="post">
            <div class="ui stacked segment">
                <div class="field">
                    <h5 id="text_email">Email</h5>
                    <div class="ui left icon input">
                        <i class="mail icon"></i>
                        <input type="email" name="email" placeholder="E-mail" value="<?= $email ?>">
                    </div>
                </div>
                <div class="field">
                    <h5 id="text_senha">Senha</h5>
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Senha">
                    </div>
                </div>
                <button class="ui animated green large fluid submit button" tabindex="0" name="login">
                    <div class="visible content">Login</div>
                    <div class="hidden content">
                        <i class="right arrow icon"></i>
                    </div>
                </button>
                <h5 id="text_cadastro">Novo por aqui? <a href="cadastro" id="clique_cadastro">Cadastre-se!</a></h5>
                <?php if (isset($error)): ?>
                    <div class="ui negative message">
                        <p>
                            <?= $error ?>
                        </p>
                    </div>
                <?php endif; ?>
                <div class="ui error message"></div>
            </div>
        </form>
        <br><br><br>
        <a href="sobre" id="sobre">
            <b>Sobre</b>
        </a>
        <a href="index" id="feed">
            <b>Início</b>
        </a>
        <a href="transparencia" id="crie">
            <b>Transparência</b>
        </a>
        <br><br><br>
    </div>
</div>
<script type="text/javascript" src="assets/front_end/js/login.js"></script>

<?php if ($data['url'][0] == 'new'): ?>
    <!-- Confirmação de cadastro -->
    <div class="ui basic modal">
        <div class="ui icon header">
            <i class="user icon"></i>
            Cadastro Concluido
        </div>
        <div class="content">
            <p>Seu cadastro foi concluído com sucesso! Para efetuar o login basta clicar em continuar e em seguida digitar seu login e sua senha.</p>
        </div>
        <div class="actions">

            <div class="ui green ok inverted button">
                <i class="checkmark icon"></i>
                Continuar
            </div>
        </div>
    </div>
<?php endif; ?>

</body>
</html>