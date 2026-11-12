<?php

if (PHP_SAPI !== 'cli') {
    http_response_code(403);
    exit('Execute este script pelo terminal. Consulte INSTALACAO.md.');
}
if (!in_array('--force', $argv, true)) {
    fwrite(STDERR, "A exportação sobrescreve os JSON originais. Faça uma cópia e execute com --force.\n");
    exit(1);
}
require __DIR__ . '/config/config.php';
require __DIR__ . '/assets/back_end/php/Project.php';
try {
    $project = new Project($config['banco']);
    $project->downloadData();
} catch (Throwable $e) {
    fwrite(STDERR, $e->getMessage() . PHP_EOL);
    exit(1);
}
