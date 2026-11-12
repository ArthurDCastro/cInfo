<?php

// Nome histórico preservado.
if (PHP_SAPI !== 'cli') {
    http_response_code(403);
    exit('Execute este script pelo terminal. Consulte INSTALACAO.md.');
}
require __DIR__ . '/config/config.php';
require __DIR__ . '/assets/back_end/php/Project.php';
try {
    $project = new Project($config['banco']);
    $project->updateData(in_array('--force', $argv, true));
} catch (Throwable $e) {
    fwrite(STDERR, $e->getMessage() . PHP_EOL);
    exit(1);
}
