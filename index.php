<?php

chdir(__DIR__);
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/app/controller/Controller.php';
require_once __DIR__ . '/app/model/create/Comentarios.php';

date_default_timezone_set('America/Sao_Paulo');

$base_url = $config['base_url'];
$padrao = $config['views_padrao'];
$base_path = parse_url($base_url, PHP_URL_PATH) ?: '/';
$request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';
$relative_path = strpos($request_path, $base_path) === 0
    ? substr($request_path, strlen($base_path))
    : ltrim($request_path, '/');
// Também aceita as URLs antigas com index.php no caminho.
$relative_path = preg_replace('#^index\\.php(?:/|$)#', '', $relative_path);
$url = $base_url . $relative_path;
$action = explode('/', $relative_path)[0] ?: 'index';

$page = new Controller();
$page->setBaseUrl($base_url);
$page->setUrl($url);
$page->setPadroes($padrao);

// Métodos internos herdados não são páginas públicas.
if (method_exists($page, $action)) {
    $method = new ReflectionMethod($page, $action);
    $valid = $method->isPublic()
        && $method->getDeclaringClass()->getName() === 'Controller'
        && $method->getNumberOfRequiredParameters() === 0;
} else {
    $valid = false;
}
if ($valid) {
    $page->$action();
} else {
    $page->error_404();
}
