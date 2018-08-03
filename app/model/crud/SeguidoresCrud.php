<?php

class SeguidoresCrud
{

    protected $manager;

    public function __construct()
    {
        $this->manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    }

    public function getAllData(){
        $query = new MongoDB\Driver\Query([]);
        $cursor =  $this->manager->executeQuery('db_cinfo.seguidores', $query);

        $list = [];

        foreach ($cursor as $document) {
            $array = (array) $document;
            $list[] = new Seguidores($array['seguidor'], $array['seguindo'], $array['dti'], $array['dtf']);
        }

        return $list;
    }

    public function getSeguidores_bySeguidor($seguidor){
        $query = new MongoDB\Driver\Query(['seguidor' => $seguidor]);
        $cursor =  $this->manager->executeQuery('db_cinfo.seguidores', $query);

        foreach ($cursor as $document) {
            $array = (array) $document;
        }

        return new Seguidores($array['seguidor'], $array['seguindo'], $array['dti'], $array['dtf']);
    }

    public function getSeguidores_byDti($dti){
        $query = new MongoDB\Driver\Query(['dti' => $dti]);
        $cursor =  $this->manager->executeQuery('db_cinfo.seguidores', $query);

        foreach ($cursor as $document) {
            $array = (array) $document;
        }

        return new Seguidores($array['seguidor'], $array['seguindo'], $array['dti'], $array['dtf']);
    }

    public function add(Seguidores $seguidores){

        $bulk = new MongoDB\Driver\BulkWrite;

        $bulk->insert($seguidores->insert());

        $this->manager->executeBulkWrite('db_cinfo.seguidores', $bulk);
    }

    public function delete($dtf){

        $bulk = new MongoDB\Driver\BulkWrite;

        $bulk->insert(['dtf' => $dtf]);

        $this->manager->executeBulkWrite('db_cinfo.seguidores', $bulk);
    }

}
