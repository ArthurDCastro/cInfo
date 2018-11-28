<script type="text/javascript" src="assets/vendor/front/html2canvas/html2canvas.js"></script>
<script type="text/javascript" src="assets/vendor/front/semantic/components/form.js"></script>
<script type="text/javascript" src="assets/vendor/front/semantic/components/modal.js"></script>

<script type="text/javascript" src="assets/front_end/js/crie.js"></script>
<script type="text/javascript" src="assets/charts/crie.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    <?php if (!isset($data['url'][0])): ?>
        $('#share').hide();
    <?php else: ?>
        $('#teste').trigger('click');
        $('#grafico_titulo').text($('#titulo').val());
    <?php endif; ?>
    })
</script>
<link rel="stylesheet" href="assets/front_end/css/crie.css">

<link rel="stylesheet" href="assets/vendor/front/semantic/components/form.css">
<link rel="stylesheet" href="assets/vendor/front/semantic/components/modal.css">

<div class="ui grid horizontal segments" style=" margin: 90px 10px 10px 10px;">
    <div class="seven wide column ui segment center aligned">
        <div class="centered" id="print">
            <h3 class="ui grey header">
                <i class="pie chart icon"></i>
                <div class="content" id="grafico_titulo"></div>
            </h3>
            <div id="chart">

            </div>

            <div class="ui grid">
                <div class="three column row">
                    <div class="column">
                        <h5 class="ui grey header">
                            <i class="user icon"></i>
                            <div class="content"><?= $_COOKIE['login'] ?></div>
                        </h5>
                    </div>
                    <div class="column">
                        <img src="assets/files/img/logo.png" width="50px">
                    </div>
                    <div class="column">
                        <h5 class="ui grey right floated header">
                            <i class="calendar alternate icon"></i>
                            <div class="content"><?= date("Y-m-d") ?></div>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="seven wide column middle aligned">
        <div class="ui segment">
            <form class="ui form">
                <h4 class="ui dividing header">Informações do Grafico</h4>

                <!-- Titulo -->
                <div class="required field">
                    <label>Título do Gráfico</label>
                    <input type="text" name="titulo" placeholder="Título" id="titulo" value="<?= $data['grafico']->getTitulo() ?>">
                </div>

                <!-- codigo do grafico (se possuir) -->
                <input type="text" name="id" id="id" value="<?= $data['url'][0] ?>">

                <!-- tipo do grafico -->
                <div class="required field">
                    <label>Tipo de Gráfico</label>
                    <div class="ui fluid search selection dropdown">
                        <input type="hidden" name="tipo" id="tipo" value="<?= $data['grafico']->getTipo() ?>">
                        <i class="dropdown icon"></i>
                        <div class="default text">Selecione o Tipo de Gráfico</div>
                        <div class="menu">
                            <div class="item" data-value="pie"><i class="pie chart icon"></i>Pizza</div>
                            <div class="item" data-value="doughnut"><i class="dot circle icon"></i>Donut</div>
                            <div class="item" data-value="polarArea"><i class="bullseye icon"></i>Area Polar</div>
                        </div>
                    </div>
                </div>

                <!-- funcoes de gasto -->
                <div class="field">
                    <label>Assunto de gasto</label>
                    <select id="funcao" name="funcao" multiple="" class="ui dropdown">
                        <option value="">Assunto de gasto</option>
                        <?php foreach ($data['funcoes'] as $func): ?>
                            <option value="<?= $func['codigo'] ?>"><?= $func['nome'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- gastos -->
                <div class="required field" id="gastos">
                    <label>Gastos</label>
                    <select id="gasto" multiple="" name="gasto" class="ui fluid search dropdown gasto">
                        <option value="">Gasto</option>
                        <?php foreach ($data['grafico']->getDados() as $dt):?>
                            <option value="<?= $dt->getCodigo() ?>" selected><?= $dt->getNome()?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- botoes-->
                <div class="fields">
                    <div class="field">
                        <div class="ui vertical animated green small button" tabindex="0" id="teste">
                            <div class="visible content">Teste</div>
                            <div class="hidden content">
                                <i class="play icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui vertical animated blue small button" tabindex="0" id="salvar">
                            <div class="visible content">Salvar</div>
                            <div class="hidden content">
                                <i class="save icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui clear vertical animated red small button" tabindex="0">
                            <div class="visible content">Cancelar</div>
                            <div class="hidden content">
                                <i class="remove icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui vertical animated blue basic small button" tabindex="0" id="share">
                            <div class="visible content">Compartilhar</div>
                            <div class="hidden content">
                                <i class="share icon"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Confirmação de salvo -->
<div class="ui basic modal" id="salvo">
    <div class="ui icon header">
        <i class="save icon"></i>
        Gráfico Salvo
    </div>
    <div class="content">
        <p>Seu gráfico foi salvo com sucesso, ele estará disponível em seu portifólio de gráficos. Se quiser compartilhar em outras redes sociais ou apenas exportar, clique em continuar e, em seguida, no botão compartilhar.</p>
    </div>
    <div class="actions">
        <div class="ui blue ok inverted button" id="clear">
            <i class="checkmark icon"></i>
            Criar outro grafico
        </div>
        <div class="ui green ok inverted button">
            <i class="checkmark icon"></i>
            Continuar
        </div>
    </div>
</div>

<div class="ui fullscreen modal" id="publicar">
    <i class="close icon"></i>
    <div class="header" id="tituloModal">

    </div>
    <form id="post" action="post" method="post">
        <div class="scrolling image content">

            <div class="description" style="width: 100%">
                <div class="ui feed">
                    <div class="event" style="padding-top: 10px; padding-left: 15px">
                        <div class="label">
                            <img src="<?= $data['foto'] ?>">
                        </div>
                        <div class="content">
                            <div class="summary">
                                <a id="userModal"><?=$_COOKIE['login']?></a>
                                <div class="date" id="dataModal">
                                    agora mesmo
                                </div>
                            </div>
                            <br>
                            <div class="ui form">
                                <div class="field">
                                    <textarea name="descricao" style="width: 45%; height: 800px; margin-left: 13px"></textarea>
                                    <div class="ui large image" style="padding-left: 12%">
                                        <div id="chartModal" style=" width:370px; height:370px"></div>
                                    </div>
                                    <div class="actions">
                                        <div class="ui black deny button">
                                            Cancelar
                                        </div>
                                        <button type="submit" class="ui positive right labeled icon button">
                                            Postar
                                            <i class="checkmark icon"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>