<?php

    include "config/config.php";

    function carregaDados($banco){

        $conexao = new Mongo();

        $banco = $conexao->selectDB($banco['nomeDB']);

        foreach ($banco['collections'] as $key => $collection){
            $nova = (array) json_decode(file_get_contents($collection['file'], true));
            $conexao->creatCollection($key);
        }

    }
    
    carregaDados($config['banco']);