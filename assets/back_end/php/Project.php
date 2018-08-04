<?php
/**
 * Created by PhpStorm.
 * User: Arthur Castro
 * Date: 28/04/2018
 * Time: 00:20
 */

class Project
{
    private $banco;

    public function __construct($banco)
    {
        $this->banco = $banco;
        $this->manager = new MongoDB\Driver\Manager($banco['uri']);
    }

    public function getJson(string $caminho){
        return json_decode(file_get_contents($caminho), true);
    }

    public function setJson(string $caminho, array $array){
        file_put_contents($caminho, json_encode($array, JSON_PRETTY_PRINT));
    }

    public function updateData(){
        foreach ($this->banco['collections'] as $collection => $caminho){
            $list = $this->getJson($caminho['file']);

            print_r($collection);
            echo "\n";

            try {
                $command = new MongoDB\Driver\Command(['create' => $collection]);

                $this->manager->executeCommand("db_cinfo", $command);
            } catch (Exception $e){

            }

            $bulk = new MongoDB\Driver\BulkWrite;

            $bulk->delete([]);


            $this->manager->executeBulkWrite('db_cinfo.' . $collection, $bulk);

            foreach ($list as $document){
                $bulk = new MongoDB\Driver\BulkWrite;

                unset($document['_id']);

                $bulk->insert($document);

                $this->manager->executeBulkWrite('db_cinfo.' . $collection, $bulk);
            }

        }
    }

    public function downloadData(){
        foreach ($this->banco['collections'] as $collection => $caminho){

            print_r($collection);
            echo "\n";

            $query = new MongoDB\Driver\Query([]);
            $cursor =  $this->manager->executeQuery('db_cinfo.' . $collection, $query);

            $list = [];

            foreach ($cursor as $document) {
                $list[] = (array) $document;
            }

            $this->setJson($caminho['file'], $list);
        }
    }


}