<script rel="stylesheet" src="assets/front_end/js/crie.js"></script>
<link rel="stylesheet" href="assets/front_end/css/crie.css">
<script type="text/javascript" src="assets/vendor/front/semantic/components/form.js"></script>
<link rel="stylesheet" href="assets/vendor/front/semantic/components/form.css">
<div class="ui grid horizontal segments" style=" margin: 90px 10px 10px 10px;">
    <div class="seven wide column ui segment center aligned">
        <div class="centered" id="chart">

        </div>
    </div>
    <div class="seven wide column middle aligned">
        <div class="ui segment">
            <form class="ui form">
                <h4 class="ui dividing header">Informações do Grafico</h4>
                <div class="field">
                    <label>Título do Gráfico</label>
                    <div class="field">
                        <input type="text" name="titulo" placeholder="Título" id="titulo">
                    </div>
                    <div class="field">
                        <label>Tipo de Gráfico</label>
                        <div class="field">
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
                    </div>
                    <div class="field">
                        <label>Assunto de gasto</label>
                        <select id="funcao" name="funcao" multiple="" class="ui dropdown">
                            <option value="">Assunto de gasto</option>
                            <?php foreach ($data['funcoes'] as $func): ?>
                                <option value="<?= $func['codigo'] ?>"><?= $func['nome'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="field" id="gastos">
                        <label>Gastos</label>
                        <div class="field">
                            <select id="gasto" multiple="" name="gasto" class="ui dropdown gasto">
                                <option value="">Gasto</option>
                            </select>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="field">
                            <div class="ui vertical animated green button" tabindex="0" id="teste">
                                <div class="visible content">Teste</div>
                                <div class="hidden content">
                                    <i class="play icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui vertical animated blue button" tabindex="0" id="salvar">
                                <div class="visible content">Salvar</div>
                                <div class="hidden content">
                                    <i class="save icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui clear vertical animated red button" tabindex="0">
                                <div class="visible content">Cancelar</div>
                                <div class="hidden content">
                                    <i class="remove icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui vertical animated blue basic button" tabindex="0">
                                <div class="visible content">Compartilhar</div>
                                <div class="hidden content">
                                    <i class="share icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script rel="stylesheet" src="assets/charts/crie.js"></script>
