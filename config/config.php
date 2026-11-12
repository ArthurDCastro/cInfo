<?php

$config['base_url']     = getenv('CINFO_BASE_URL') ?: 'http://localhost/cInfo/';

$config['views_padrao'] = 'padroes/';

$config['banco'] = [
    'uri'         => getenv('CINFO_MONGODB_URI') ?: 'mongodb://localhost:27017',
    'nomeDB'      => getenv('CINFO_DB_NAME') ?: 'db_cinfo',
    'collections' => [
        'user'    => [
            'file' => 'documents/mongoDB/db/user.json'
        ],
        'grafico' => [
            'file'  => 'documents/mongoDB/db/grafico.json'
        ],
        'dados' => [
            'file'  => 'documents/mongoDB/db/dados.json'
        ],
        'funcoes' => [
            'file'  => 'documents/mongoDB/db/funcoes.json'
        ],
        'seguidores' => [
            'file'  => 'documents/mongoDB/db/seguidores.json'
        ],
        'postagem' => [
            'file'  => 'documents/mongoDB/db/postagem.json'
        ]
    ]
];

// Configuração local opcional, sem alterar os valores originais versionados.
if (is_file(__DIR__ . '/config.local.php')) {
    require __DIR__ . '/config.local.php';
}
$config['base_url'] = rtrim($config['base_url'], '/') . '/';

return $config;
