<script rel="stylesheet" src="<?php echo $config['base_url'] ?>assets/charts/crie.js"></script>
<script rel="stylesheet" src="<?php echo $config['base_url'] ?>assets/front_end/crie.js"></script>
<div class="ui grid horizontal segments" style=" margin: 90px 10px 10px 10px;">
    <div class="ten wide column ui segment">
        <div class="centered">
            <div id="piechart_div"></div>
        </div>
    </div>
    <div class="six wide column ui segment">
        <form class="ui form">
            <h4 class="ui dividing header">Shipping Information</h4>
            <div class="field">
                <label>Título do Gráfico</label>
                <div class="field">
                    <input type="text" name="shipping[first-name]" placeholder="Título">
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
                    <label>Ano de Exercício</label>
                    <div class="field">
                        <div class="ui fluid search selection dropdown">
                            <input type="hidden" name="country">
                            <i class="dropdown icon"></i>
                            <div class="default text">Exercício</div>
                            <div class="menu">
                                <div class="item" data-value="2017">2017</div>
                                <div class="item" data-value="2016">2016</div>
                                <div class="item" data-value="2015">2015</div>
                                <div class="item" data-value="2014">2014</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field gastos">
                    <label>Gastos</label>
                    <div class="field">
                        <select class="ui search dropdown">
                            <option class="item" data-value="null">...</option>
                            <option class="item" data-value="educ">Educação</option>
                            <option class="item" data-value="saud">Saúde</option>
                            <option class="item" data-value="agri">Agricultura</option>
                            <option class="item" data-value="tecn">Ciência e Tecnologia</option>
                        </select>
                    </div>
                    <div class="field">
                        <select class="ui search dropdown">
                            <option class="item" data-value="null">...</option>
                            <option class="item" data-value="educ">Educação</option>
                            <option class="item" data-value="saud">Saúde</option>
                            <option class="item" data-value="agri">Agricultura</option>
                            <option class="item" data-value="tecn">Ciência e Tecnologia</option>
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
                        <div class="ui vertical animated green button" tabindex="0">
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
