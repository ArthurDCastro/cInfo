<link rel="stylesheet" href="assets/vendor/front/bxSlider/jquery.bxslider.css">
<link rel="stylesheet" href="../../assets/front_end/inicio.css">
<script src="assets/vendor/front/bxSlider/jquery.bxslider.js"></script>
<script src="assets/front_end/js/inicio.js"></script>
<script rel="stylesheet" src="assets/charts/inicio.js"></script>

<div style="margin-top: 80px"></div>
<div class="ui two column centered grid">
    <div class="column" id="corpo" style="width: 2002px">
        <ul class="bxslider">
            <li>
                <div class="ui equal width centered padded grid">
                    <div class="row">
                        <div class="black column">
                            <div id="piechart_div"></div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="ui equal width centered padded grid">
                    <div class="row">
                        <div class="black column">
                            <div id="barchart_div"></div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="ui equal width centered padded grid">
                    <div class="row">
                        <div class="black column">
                            <div id="blachart_div"></div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="black" style="height: 550px;
    position: relative">
                <img class="ui center aligned" src="<?php echo $config['base_url'] ?>assets/vendor/front/bxSlider/images/pic1.jpg" style="width:100%; margin: 0; background: yellow; position: absolute; top: 50%; left: 50%; margin-right: -50%; transform: translate(-50%, -50%) "/>
            </li>
        </ul>


        <div class="ui three column grid" style="margin: 0 10px 10px 10px">

            <div class="column">
                <div class="ui green fluid card">
                    <div class="content">
                        <div class="header">
                            <i class="arrow up icon"></i>
                            R$20,00
                        </div>
                        <div class="description">
                            Arrecadação - R$3000 (10%)
                        </div>
                    </div>
                    <div class="ui bottom attached button">
                        <i class="add icon"></i>
                        Mais informações
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="ui red fluid card">
                    <div class="content">
                        <div class="header centered">
                            <i class="arrow down icon"></i>
                            R$20,00
                        </div>
                        <div class="description">
                            Despesas totais - R$3000 (10%)
                        </div>
                    </div>
                    <div class="ui bottom attached button">
                        <i class="add icon"></i>
                        Mais informações
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="ui inverted yellow fluid card">
                    <div class="content">
                        <div class="header">R$20,00</div>
                        <div class="description">
                            Divida Pública - R$3000 (10%)
                        </div>
                    </div>
                    <div class="ui bottom attached button">
                        <i class="add icon"></i>
                        Mais informações
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
