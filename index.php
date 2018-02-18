<?php

require_once 'config/config.php';
require_once 'app/controller/Controller.php';
require_once 'app/controller/engine/Construct.php';

$url    = $config['base_url'];
$padrao = $config['views_padrao'];

$url = $_SERVER['REQUEST_URI'];

$action = explode('.php/', $url);

$action = @$action[1];

if (!isset($action)){
    $action = 'index';
}

$page = new Controller();
$page->setUrl($url);
$page->setPadroes($padrao);

$methods = get_class_methods($page);

$verificaPage = false;
foreach ($methods as $method){
    if ($method == $action){
        $verificaPage = true;
        break;
    }
}

$construct = new Construct();

if ($verificaPage){
    $load = $construct->constroi($action, '$page');
} else {
    $load = $construct->constroi('error_404', '$page');
}

@eval($load);