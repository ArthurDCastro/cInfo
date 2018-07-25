<?php
/**
 * Created by PhpStorm.
 * User: Arthur Castro
 * Date: 13/07/2018
 * Time: 13:10
 */

require_once '../model/crud/DadosCrud.php';
require_once '../model/crud/GraficoCrud.php';
require_once '../model/crud/UserCrud.php';

require_once '../model/create/Dados.php';

switch ($_POST['acao']){
    case 'funcao':
        $dados = new DadosCrud();
        $data = [];
        foreach ($_POST['vals'] as $val){
            $d = $dados->getDados_byFuncao($val);
            foreach ($d as $v){
                $data[] = $v->get_array();
            }
        }
        $vals = json_encode($data);
        header("Conten-type: application/json");
        echo $vals;
}