
        <link rel="stylesheet" href="assets/vendor/front/semantic/semantic.css">
    <link rel="stylesheet" href="assets/front_end/css/cadastro.css">
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
        <h1 class="ui teal image header">
            <div class="content">
                <h3 id="text_login">Cadastre-se!</h3>
            </div>
        </h1>
        <br><br>
        <form class="ui large form" action="cadastro" method="post">
            <div class="ui stacked segment">
                <div class="field">
                    <h5 id="text_nome">Nome Completo</h5>
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="nome" placeholder="Nome">
                    </div>
                </div>
                <div class="field">
                    <h5 id="text_nome_exib">Nome de Exibição</h5>
                    <div class="ui left icon input">
                        <i class="unhide icon"></i>
                        <input type="text" name="nome_exib" placeholder="Nome de Exibição">
                    </div>
                </div>
                <div class="field">
                    <h5 id="text_email">Email</h5>
                    <div class="ui left icon input">
                        <i class="mail icon"></i>
                        <input type="email" name="email" placeholder="E-mail">
                    </div>
                </div>
                <div class="field">
                    <h5 id="text_senha">Senha</h5>
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Senha">
                    </div>
                </div>
                <button name="cadastro" class="ui animated green large fluid submit button" tabindex="0">
                    <div class="visible content">Cadastre-se</div>
                    <div class="hidden content">
                        <i class="right arrow icon"></i>
                    </div>
                </button>
                <h5 id="text_login">Já tem uma conta? <a href="login" id="clique_login"> Entre!</a></h5>
                <div class="ui error message"></div>
            </div>
        </form>
        <br><br><br>
        <a href="sobre" id="sobre"><b>Sobre</b></a>
        <a href="index" id="feed"><b>Início</b></a>
        <a href="crie" id="crie"><b>Crie</b></a>
        <br><br><br>
    </div>
</div>
<script type="text/javascript" src="assets/front_end/js/cadastro.js"></script>
</body>
</html>