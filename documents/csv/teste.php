<?php
/**
 * Created by PhpStorm.
 * User: Arthur Castro
 * Date: 16/07/2018
 * Time: 14:31
 */
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$query = new MongoDB\Driver\Query([]);
$cursor =  $manager->executeQuery('db_cinfo.dados', $query);

$list = [];

foreach ($cursor as $document) {
    $array = (array) $document;
    $list[] = $array;
}

foreach ($list as $l){
    if ($l['pai'] == 'brasil'){
        $funcoes[] = ['codigo' => $l['codigo'], 'nome' => $l['nome']];
    }
}

print_r($funcoes);


/*print_r($tituloAberto);

var_dump($newArray);
*/

foreach ($funcoes as $ar){

    $bulk = new MongoDB\Driver\BulkWrite;

    print_r($ar);

    $bulk->insert($ar);

    $manager->executeBulkWrite('db_cinfo.funcoes', $bulk);
}
