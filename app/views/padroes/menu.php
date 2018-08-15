    <link rel="stylesheet" href="assets/front_end/css/menu.css">
    <link rel="stylesheet" href="assets/vendor/front/semantic/components/dropdown.css">
    <script src="assets/vendor/front/semantic/components/dropdown.js"></script>
    <script src="assets/front_end/js/menu.js"></script>
</head>

<body>
    <div class="ui grid">
        <div class="ten wide column centered">
            <div class="ui secondary pointing huge three item top fixed menu" id="menu">

                <!-- menu -->
                <div id="some" class="item">
                    <a class="item" href="sobre">
                        Sobre
                    </a>
                    <?php if (isset($_COOKIE['login'])): ?>
                        <a  class="item" href="feed">
                            Feed
                        </a>
                        <a  class="item" href="crie">
                            Crie
                        </a>
                    <?php endif; ?>
                </div>

                <!-- sidebar -->
                <div id="aparecer" class="item">
                    <button class="ui icon button botao">
                        <i class="sidebar icon"></i>
                    </button>
                </div>

                <!-- logo -->
                <a class="item" href="index" id="logo">
                    <img src="assets/files/img/logo.png" style="">
                </a>


                <!-- user -->
                <div class="item">

                    <!-- search -->
                    <div class="item">
                        <div class="ui transparent icon input" id="right" style="">
                            <input type="text" placeholder="Search">
                            <i class="search link icon"></i>
                        </div>
                    </div>

                    <?php if (isset($_COOKIE['login'])): ?>
                        <a id="some" class="item" href="perfil/<?=$_COOKIE['login']?>">
                            <?= $_COOKIE['login'] ?>
                        </a>

                        <a id="some" class="item" href="logout">Sair</a>
                    <?php else: ?>
                            <a id="some" href="login" class="item some">Login</a>
                            <a id="some" href="cadastro" class="item some">Cadastre-se</a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

        <!-- primeira parte do menu na vertical-->
    <div class="ui left demo vertical sidebar labeled icon menu nav1">
        <a href="index" class="item padrao_option">
            <i class="home icon"></i>
            Home
        </a>
        <a href="sobre" class="item padrao_option">
            <i class="book  icon"></i>
            Sobre
        </a>

        <?php if (isset($_COOKIE['login'])): ?>
            <a href="crie" class="item padrao_option">
                <i class="chart pie icon"></i>
                Crie
            </a>
            <a href="feed" class="item padrao_option">
                <i class="smile icon"></i>
                Feed
            </a>
        <?php endif; ?>
        <?php if (isset($_COOKIE['login'])): ?>
        <a href="perfil/<?=$_COOKIE['login']?>" class="item padrao_option">
           <i class="user circle icon"></i>
            <?= $_COOKIE['login'] ?>
        </a>
        <a href="logout" class="item padrao_option">
            <i class="power off icon"></i>
            Sair
        </a>
        <?php else: ?>
            <a href="login" class="item padrao_option">
                <i class="user icon"></i>
                Login
            </a>
            <a href="cadastro" class="item padrao_option">
                <i class="user plus icon"></i>
                Cadastre-se
            </a>
        <?php endif; ?>
    </div>









