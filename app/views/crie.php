<script type="text/javascript" src="assets/vendor/front/html2canvas/html2canvas.js"></script>
<script type="text/javascript" src="assets/vendor/front/semantic/components/form.js"></script>

<script type="text/javascript" src="assets/front_end/js/crie.js"></script>
<script type="text/javascript" src="assets/charts/crie.js"></script>

<link rel="stylesheet" href="assets/front_end/css/crie.css">

<link rel="stylesheet" href="assets/vendor/front/semantic/components/form.css">

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
                    <input type="text" name="titulo" placeholder="Título" id="titulo">
                </div>

                <!-- codigo do grafico (se possuir) -->
                <input type="text" name="id" id="id" value="<?= $data['url'][0] ?>">

                <!-- tipo do grafico -->
                <div class="required field">
                    <label>Tipo de Gráfico</label>
                    <div class="ui fluid search selection dropdown">
                        <input type="hidden" name="tipo" id="tipo">
                        <i class="dropdown icon"></i>
                        <div class="default text">Selecione o Tipo de Gráfico</div>
                        <div class="menu">
                            <div class="item" data-value="pie"><i class="pie chart icon"></i>Pizza</div>
                            <div class="item" data-value="doughnut"><i class="pie chart icon"></i>Donut</div>
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
                        <div class="ui vertical animated blue basic small button" tabindex="0" id="export">
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
<div class="ui basic modal">
    <div class="ui icon header">
        <i class="save icon"></i>
        Gráfico Salvo
    </div>
    <div class="content">
        <p>Seu gráfico foi salvo com sucesso, ele esta disponivel no seu <a href="graficos">portifolio de graficos</a>. Se quiser compartilhar em outras redes sociais ou apenas exportar só clicar em continuar e em seguida no botão compartilhar.</p>
    </div>
    <div class="actions">

        <div class="ui green ok inverted button">
            <i class="checkmark icon"></i>
            Continuar
        </div>
    </div>
</div>


<div id="img-out">
    <a id="salvar"></a>
</div>


