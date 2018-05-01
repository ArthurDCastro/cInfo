    <link rel="stylesheet" href="assets/front_end/menu.css">
    <link rel="stylesheet" href="assets/vendor/front/semantic/components/dropdown.css">
    <script src="assets/vendor/front/semantic/components/dropdown.js"></script>
    <script src="assets/front_end/menu.js"></script>

</head>

<div class="ui grid">
    <div class="ten wide column centered">
        <div class="ui secondary pointing huge three item top fixed menu" id="menu">
            <div class="item">
                    <a class="item" href="sobre">
                        Sobre
                    </a>
                    <a class="item" href="feed">
                        Feed
                    </a>
                    <a class="item" href="crie">
                        Crie
                    </a>
            </div>
            <a class="item" href="index" id="logo">
                <img src="assets/files/img/logo.png" style="">
            </a>
            <div class="item">
                <div class="item">
                    <div class="ui transparent icon input" id="right" style="">
                        <input type="text" placeholder="Search users">
                        <i class="search link icon"></i>
                    </div>
                </div>
                <div class="item"></div>
                <div class="ui dropdown">
                    <img class="ui avatar image" src="assets/files/img/avatar/small/elliot.jpg">
                    Username
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item">Perfil</a>
                        <a class="item">Amigos</a>
                        <a class="item">Gráficos</a>
                        <a class="item" href="logout">Sair</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>