<?php

    require_once 'config/config.php';
    require_once 'app/controller/Controller.php';

require_once 'app/model/create/Comentarios.php';

date_default_timezone_set('America/Sao_Paulo');

    $base_url    = $config['base_url'];
    $padrao = $config['views_padrao'];

    $url = 'http://localhost' . $_SERVER['REQUEST_URI'];

    $action = @explode('/',explode($base_url, $url)[1])[0];


    if ($action == ""){
        $action = 'index';
    }


    $page = new Controller();
    $page->setBaseUrl($base_url);
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

    if ($verificaPage){
        $load = $page->constroi($action, '$page');
    } else {
        $load = $page->constroi('error_404', '$page');
    }

    @eval($load);