<link rel="stylesheet" href="assets/front_end/css/graficos.css">
<script type="text/javascript" src="assets/front_end/js/perfil.js"></script>
<script type="text/javascript" src="assets/front_end/js/graficos.js"></script>

<?php  if (!isset($graficos)): ?>
    <div class="ui middle aligned center aligned grid">
        <div class="ui container" id="erro">
            <div class="ui negative message">
                <div class="header">
                    Ops você ainda não tem gráficos...
                </div>
                <p>Crie seus gráficos <b><a href="crie" id="darkred"">aqui</a></b></p>
            </div>
        </div>
    </div>
<?php else: ?>
    <!--Modal  -->
    <div class="ui basic modal" id="modal_excluir">
        <div class="ui icon header">
            <i class="trash alternate outline icon"></i>
            Excluir Gráfico
        </div>
        <div class="content">
            <p >Você tem certeza que deseja excluir este gráfico da sua galeria? Ele será apagado permanentemente e você não terá mais acesso a ele. </p>
        </div>
        <div class="actions">
            <div class="ui red basic cancel inverted button">
                <i class="remove icon"></i>
                Não
            </div>
            <div class="ui green ok inverted button" id="excluir">
                <i class="checkmark icon"></i>
                Sim
            </div>
        </div>
    </div>
    <!--Modal FIM -->
    <div id="oculta"></div>
    <div id="conteudo">
        <div class="ui link cards" id="cards">
            <?php foreach ($graficos as $grafico): ?>
                <div id="<?= $grafico->getCodigo() ?>" class="ui centered card grafico">
                    <a class="ui corner red label msgExcluir">
                        <i class="remove icon"></i>
                    </a>
                    <div class="info">
                        <div id="tipo-<?= $grafico->getCodigo() ?>"><?= $grafico->getTipo() ?></div>
                        <?php foreach ($grafico->getDados() as $dado): ?>
                            <div class="nome"><?= $dado['nome']?></div>
                            <div class="gasto"><?= $dado['gasto']?></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="image" style="padding: 15px">
                        <canvas id="grafico-<?= $grafico->getCodigo() ?>" width="100" height="100"></canvas>
                    </div>
                    <div class="content">
                        <div class="header"><?= $grafico->getTitulo() ?></div>
                        <div class="meta">
                            <span class="date">Criado em: <?= $grafico->getData() ?></span>
                        </div>
                    </div>
                    <div class="extra content">
                        <a>
                            <i class="user icon"></i>
                            <?= $grafico->getUser() ?>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

