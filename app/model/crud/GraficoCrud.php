<?php
/**
 * Created by PhpStorm.
 * User: Arthur Castro
 * Date: 27/04/2018
 * Time: 23:46
 */

class GraficoCrud
{
    private $manager;

    public function __construct()
    {
        $this->manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    }

    public function getAllData(){
        $query = new MongoDB\Driver\Query([]);
        $cursor =  $this->manager->executeQuery('db_cinfo.graficos', $query);

        $list = [];

        foreach ($cursor as $document) {
            $array = (array) $document;
            $list[] = new Grafico($array['titulo'], $array['tipo'], $array['user'], $array['data'], $array['dados']);
        }

        return $list;
    }

    public function add(Grafico $grafico){

        $bulk = new MongoDB\Driver\BulkWrite;

        $bulk->insert($grafico->insert());

        $this->manager->executeBulkWrite('db_cinfo.grafico', $bulk);
    }
}