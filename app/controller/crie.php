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

date_default_timezone_set('America/Sao_Paulo');

function cmp($a, $b) {
    return $a[1] > $b[1];
}


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

        usort($data, 'cmp');

        $vals = json_encode($data);
        header("Conten-type: application/json");
        echo $vals;

        break;

    case 'teste':
        $dados = new DadosCrud();

        $list = $_POST['vals'];

        $vals = [
            'codigo' => [],
            'nome'   => [],
            'gasto'  => []
        ];
        foreach ($list as $item){
            $dado = $dados->getDados_byCodigo($item);
            $vals['codigo'][] = $dado->getCodigo();
            $vals['nome'][] = $dado->getNome();
            $vals['gasto'][] = (float) $dado->getGasto();
        }

        $vals = json_encode($vals);
        header("Conten-type: application/json");
        echo $vals;
        break;

    case 'salvar':
        $dados = new DadosCrud();
        $graficos = new GraficoCrud();

        if ($_POST['vals']['id'] == ''){
            $id = '';
        } else{
            $id = $_POST['vals']['id'];
        }

        $grafico = [
            "codigo"      => (string) $id,
            "titulo"  => $_POST['vals']['titulo'],
            "tipo"    => $_POST['vals']['tipo'],
            "data"    => date("Y-m-d H:i:s"),
            "user"    => $_COOKIE['login'],
            "dados"   => []
        ];

        foreach ($_POST['vals']['dados'] as $dado){
            $d = $dados->getDados_byCodigo($dado);

            $grafico['dados'][] = [
                'nome'   => $d->getNome(),
                'gasto'  => $d->getGasto(),
                'codigo' => $dado
            ];
        }

        if ($_POST['vals']['id'] == ''){

            $grafico['codigo'] = uniqid();

            $graficos->add($grafico);

        } else {

            $graficos->update($grafico);

        }

        $vals = json_encode($grafico);

        header("Conten-type: application/json");

        echo $vals;
        break;
}