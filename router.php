<?php

// Roteador exclusivo do servidor local: php -S localhost:8000 router.php
$path = rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/');
$file = realpath(__DIR__ . $path);
if ($file !== false && strpos($file, __DIR__ . DIRECTORY_SEPARATOR) === 0 && is_file($file)) {
    return false;
}
require __DIR__ . '/index.php';
