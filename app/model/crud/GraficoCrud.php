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
        $cursor =  $this->manager->executeQuery('db_cinfo.grafico', $query);

        $list = [];

        foreach ($cursor as $document) {
            $array = (array) $document;
            $list[] = new Grafico($array['titulo'], $array['tipo'], $array['user'], $array['data'], $array['dados']);
        }

        return $list;
    }

    public function getGraficos_byCodigo($codigo){
        $query = new MongoDB\Driver\Query(['codigo' => (string) $codigo]);
        $cursor =  $this->manager->executeQuery('db_cinfo.dados', $query);

        $array = [];
        foreach ($cursor as $document) {
            $array = (array) $document;
        }

        return new Grafico($array['titulo'], $array['tipo'], $array['user'], $array['data'], $array['dados']);
    }

    public function add($grafico){

        $bulk = new MongoDB\Driver\BulkWrite;

        $bulk->insert($grafico);

        $this->manager->executeBulkWrite('db_cinfo.grafico', $bulk);
    }

    public function update($grafico){

        $bulk = new MongoDB\Driver\BulkWrite;

        $bulk->update(['codigo' => $grafico['codigo']], $grafico);

        $this->manager->executeBulkWrite('db_cinfo.grafico', $bulk);
    }
}