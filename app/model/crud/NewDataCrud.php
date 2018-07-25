<?php
/**
 * Created by PhpStorm.
 * User: Arthur Castro
 * Date: 17/07/2018
 * Time: 19:02
 */

class NewDataCrud
{
    private $manager;

    public function __construct()
    {
        $this->manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    }

    public function getAllData(){
        $query = new MongoDB\Driver\Query([]);
        $cursor =  $this->manager->executeQuery('db_cinfo.new_data', $query);

        $list = [];

        foreach ($cursor as $document) {
            $array = (array) $document;
            $list[] = new Dados($array['codigo_orgao_subordinado'], $array['nome_orgao_subordinado'], $array['orcamento_realizado__r__'], $array['codigo_orgao_superior'], $array['codigo_funcao']);
        }

        return $list;
    }

    public function getDados_byCodigo($codigo){
        $query = new MongoDB\Driver\Query(['codigo' => $codigo]);
        $cursor =  $this->manager->executeQuery('db_cinfo.new_data', $query);

        foreach ($cursor as $document) {
            $array = (array) $document;
        }

        return new Dados($array['codigo_orgao_subordinado'], $array['nome_orgao_subordinado'], $array['orcamento_realizado__r__'], $array['codigo_orgao_superior'], $array['codigo_funcao']);
    }

    public function getDados_byPai($pai){
        $query = new MongoDB\Driver\Query(['pai' => $pai]);
        $cursor =  $this->manager->executeQuery('db_cinfo.new_data', $query);

        $list = [];

        foreach ($cursor as $document) {
            $array = (array) $document;
            $list[] = new Dados($array['codigo_orgao_subordinado'], $array['nome_orgao_subordinado'], $array['orcamento_realizado__r__'], $array['codigo_orgao_superior'], $array['codigo_funcao']);
        }

        return $list;
    }

    public function getFuncoes(){
        $query = new MongoDB\Driver\Query([]);
        $cursor =  $this->manager->executeQuery('db_cinfo.new_data', $query);

        $array = [];
        foreach ($cursor as $document) {
            $array[] = (array) $document;
        }

        $funcoes = [];
        $i=0;
        foreach ($array as $ar){
            $verifica = true;
            foreach ($funcoes as $func){
                if (strtolower($func['nome']) == strtolower($ar['nome_funcao'])){
                    $verifica = false;
                }
            }

            if ($verifica){
                $funcoes[$i]['nome'] =  ucwords(strtolower($ar['nome_funcao']));
                $funcoes[$i]['codigo'] = $ar['codigo_funcao'];
                $i++;
            }
        }

        return $funcoes;
    }
}