<?php
/**
 * Created by PhpStorm.
 * User: Arthur Castro
 * Date: 27/04/2018
 * Time: 23:45
 */

class DadosCrud
{

    private $manager;

    public function __construct()
    {
        $this->manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    }

    public function getAllData(){
        $query = new MongoDB\Driver\Query([]);
        $cursor =  $this->manager->executeQuery('db_cinfo.dados', $query);

        $list = [];

        foreach ($cursor as $document) {
            $array = (array) $document;
            $list[] = new Dados($array['codigo'], $array['nome'], $array['gasto'], $array['pai']);
        }

        return $list;
    }

    public function getDados_byCodigo($codigo){
        $query = new MongoDB\Driver\Query(['codigo' => $codigo]);
        $cursor =  $this->manager->executeQuery('db_cinfo.dados', $query);

        foreach ($cursor as $document) {
            $array = (array) $document;
        }

        return new Dados($array['codigo'], $array['nome'], $array['gasto'], $array['pai']);
    }

    public function getDados_byPai($pai){
        $query = new MongoDB\Driver\Query(['pai' => $pai]);
        $cursor =  $this->manager->executeQuery('db_cinfo.dados', $query);

        $list = [];

        foreach ($cursor as $document) {
            $array = (array) $document;
            $list[] = new Dados($array['codigo'], $array['nome'], $array['gasto'], $array['pai']);
        }

        return $list;
    }
}