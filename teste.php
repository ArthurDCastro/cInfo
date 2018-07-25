<?php
/**
 * Created by PhpStorm.
 * User: Arthur Castro
 * Date: 25/07/2018
 * Time: 18:01
 */

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

$query = new MongoDB\Driver\Query([]);
$cursor =  $manager->executeQuery('db_cinfo.dados', $query);

$list = [];

foreach ($cursor as $document) {
    $array = (array) $document;
    $list[] = $array;
}

$json = json_encode($list);

file_put_contents('documents/mongoDB/db/funcoes.json', $json);