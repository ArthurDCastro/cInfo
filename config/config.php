<?php

$config['base_url']     = 'http://localhost/cInfo_Oficial/';
$config['views_padrao'] = 'padroes/';

$config['banco'] = [
    'nomeDB'     => 'db_cinfo',
    'collections' => [
        'user' => [
            'file' => 'documents/mongoDB/db/user.json'
        ],
        'grafico' => [
            'file' => 'documents/mongoDB/db/grafico.json'
        ],
        'dados' => [
            'file' => 'documents/mongoDB/db/dados.json'
        ]
    ]
];