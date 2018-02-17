<?php

require_once 'config/config.php';
require_once 'app/controller/Controller.php';
require_once 'app/controller/engine/Construct.php';
require_once 'assets/back_end/navigation.php';

$url    = $config['base_url'];
$pattern = $config['views_padrao'];

if (!isset($_GET[0])){
    $acao = 'index';
} else {
    $acao = $_GET[0];
}

$page = new Controller();
$page->setUrl($url);
$page->setPadroes($pattern);

$construct = new Construct();
$load = $construct->constroi($acao, '$page');

eval($load);