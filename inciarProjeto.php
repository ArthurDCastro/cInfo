<?php

    include "config/config.php";

    function carregaDados($banco){

        $conexao = new MongoClient();

        $banco = $conexao->selectDB($banco['nomeDB']);

        foreach ($banco['collections'] as $key => $collection){
            $nova = (array) json_decode(file_get_contents($collection['file'], true));
            $conexao->execute("mongoimport --db {$banco['nomeDB']} --collection {$key} --file {$collection['file']}");

        }

    }
    
    carregaDados($config['banco']);