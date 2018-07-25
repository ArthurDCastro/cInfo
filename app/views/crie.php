<script rel="stylesheet" src="assets/front_end/js/crie.js"></script>
<link rel="stylesheet" href="assets/front_end/css/crie.css">
<div class="ui grid horizontal segments" style=" margin: 90px 10px 10px 10px;">
    <div class="seven wide column ui segment center aligned">
        <div class="centered" id="chart">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
    </div>
    <div class="seven wide column middle aligned">
        <div class="ui segment">
            <form class="ui form">
                <h4 class="ui dividing header">Shipping Information</h4>
                <div class="field">
                    <label>Título do Gráfico</label>
                    <div class="field">
                        <input type="text" name="name" placeholder="Título" id="nome">
                    </div>
                    <div class="field">
                        <label>Tipo de Gráfico</label>
                        <div class="field">
                            <div class="ui fluid search selection dropdown">
                                <input type="hidden" name="country">
                                <i class="dropdown icon"></i>
                                <div class="default text">Selecione o Tipo de Gráfico</div>
                                <div class="menu">
                                    <div class="item" data-value="pie"><i class="pie chart icon"></i>Pizza</div>
                                    <div class="item" data-value="bar"><i class="bar chart icon"></i>Barra</div>
                                    <div class="item" data-value="donut"><i class="pie chart icon"></i>Donut</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Assunto de gasto</label>
                        <select id="funcao" multiple="" class="ui dropdown">
                            <option value="">Assunto de gasto</option>
                            <?php foreach ($data['funcoes'] as $func): ?>
                                <option value="<?= $func['codigo'] ?>"><?= $func['nome'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="field gastos">
                        <label>Gastos</label>
                        <div class="field">
                            <select class="ui search dropdown gasto">
                                <option class="item" data-value="null">...</option>
                            </select>
                        </div>
                        <div class="field">
                            <select class="ui search dropdown gasto">
                                <option class="item" data-value="null">...</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui vertical animated circular mini button add_field_button" tabindex="0" onclick="">
                            <div class="hidden content">Mais</div>
                            <div class="visible content">
                                <i class="add icon"></i>
                            </div>
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
                            <div class="ui vertical animated blue button" tabindex="0">
                                <div class="visible content">Salvar</div>
                                <div class="hidden content">
                                    <i class="save icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui vertical animated red button" tabindex="0">
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

<div class="ui form">
    <div class="field" id="select">

    </div>
</div>
