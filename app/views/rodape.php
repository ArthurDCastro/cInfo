
<footer id="footer" class="ui inverted vertical footer segment">
    <div class="ui container">
        <div class="ui stackable inverted divided equal height stackable grid">
            <div class="five wide column">
                <h4 class="ui inverted header">Sobre</h4>
                <p>Desenvolvemos uma plataforma informatizada para viabilizar o acesso e Interação da comunidade com a política e economia nacional, por meio do acesso a informações do
                    <a href="http://www.portaltransparencia.gov.br/" target="_blank">portal da transparência</a>.</p>
            </div>
            <div class="three wide column">
                <h4 class="ui inverted header">cInfo</h4>
                <div class="ui inverted link list">
                    <a href="index" class="item">Início</a>
                    <a href="sobre" class="item">Sobre</a>
                    <?php if(isset($_COOKIE['login'])): ?>
                        <a href="feed" class="item">Feed</a>
                        <a href="crie" class="item">Crie</a>
                        <a href="perfil" class="item">Perfil</a>
                    <?php else: ?>
                        <a href="login" class="item">Login</a>
                        <a href="cadastro" class="item">Cadastro</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="seven wide column">
                <h4 class="ui inverted header">Desenvolvedores</h4>
                <div class="ui three column grid inverted link list">
                    <div class="column">
                        <h5 class="ui inverted header">Arthur Castro</h5>
                        <div class="inverted link list">
                            <a href="https://github.com/ArthurDCastro" class="item" target="_blank">
                                <i class="github icon"></i>
                                /ArthurDCastro
                            </a>
                            <a href="https://www.instagram.com/tuckcastroo/" class="item" target="_blank">
                                <i class="instagram icon"></i>
                                @tuckcastroo
                            </a>
                            <a href="https://twitter.com/tuckcastro" class="item" target="_blank">
                                <i class="twitter icon"></i>
                                @tuckcastro
                            </a>
                        </div>
                    </div>
                    <div class="column">
                        <h5 class="ui inverted header">João Pedro Lazarim</h5>
                        <div class="inverted link list">
                            <a href="https://github.com/Tekislla" class="item" target="_blank">
                                <i class="github icon"></i>
                                /Tekislla
                            </a>
                            <a href="https://www.instagram.com/joaolazarim/" class="item" target="_blank">
                                <i class="instagram icon"></i>
                                @joaolazarim
                            </a>
                            <a href="https://twitter.com/Tekislla" class="item" target="_blank">
                                <i class="twitter icon"></i>
                                @Tekislla
                            </a>
                        </div>
                    </div>
                    <div class="column">
                        <h5 class="ui inverted header">Vinicius Peres</h5>
                        <div class="inverted link list">
                            <a href="https://github.com/ohperes" class="item" target="_blank">
                                <i class="github icon"></i>
                                /ohperes
                            </a>
                            <a href="https://www.instagram.com/ohhperes/" class="item" target="_blank">
                                <i class="instagram icon"></i>
                                @ohhperes
                            </a>
                            <a href="https://twitter.com/ohhperes" class="item" target="_blank">
                                <i class="twitter icon"></i>
                                @ohhperes
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
