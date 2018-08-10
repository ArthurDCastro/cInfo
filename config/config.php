<?php

$config['base_url']     = 'http://localhost/cInfo/';

$config['views_padrao'] = 'padroes/';

$config['banco'] = [
    'uri'         => "mongodb://localhost:27017",
    'nomeDB'      => 'db_cinfo',
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