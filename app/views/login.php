    <link rel="stylesheet" href="assets/vendor/front/semantic/semantic.css">
    <link rel="stylesheet" href="assets/front_end/login.css">
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
                <h3 id="text_login">Logue em sua conta!</h3>
            </div>
        </h1>
        <br><br>
        <form class="ui large form">
            <div class="ui stacked segment">
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
                <div class="ui animated green large fluid submit button" tabindex="0">
                    <div class="visible content">Login</div>
                    <div class="hidden content">
                        <i class="right arrow icon"></i>
                    </div>
                </div>
                <h5 id="text_cadastro">Novo por aqui? <a href="cadastro" id="clique_cadastro">Cadastre-se!</a></h5>
            </div>
        </form>
        <br><br><br>
        <a href="sobre" id="sobre"><b>Sobre</b></a>
        <a href="index" id="feed"><b>Início</b></a>
        <a href="crie" id="crie"><b>Crie</b></a>
        <br><br><br>
        </div>
    </div>
</body>
</html>