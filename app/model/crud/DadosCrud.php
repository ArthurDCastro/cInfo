<?php

require_once __DIR__ . '/../../../config/Database.php';
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
        $this->manager = Database::manager();
    }

    public function getAllData(){
        $query = new MongoDB\Driver\Query([]);
        $cursor =  $this->manager->executeQuery(Database::collection('dados'), $query);

        $list = [];

        foreach ($cursor as $document) {
            $array = (array) $document;
            $list[] = new Dados($array['codigo'], $array['nome'], $array['gasto'], $array['pai']);
        }

        return $list;
    }

    public function getDados_byCodigo($codigo){
        $query = new MongoDB\Driver\Query(['codigo' => (string) $codigo]);
        $cursor =  $this->manager->executeQuery(Database::collection('dados'), $query);

        $array = [];
        foreach ($cursor as $document) {
            $array = (array) $document;
        }

        return new Dados($array['codigo'], $array['nome'], $array['gasto'], $array['pai']);
    }

    public function getDados_byPai($pai){
        @$pai = (string) $pai;
        $query = new MongoDB\Driver\Query(['pai' => $pai]);
        $cursor =  $this->manager->executeQuery(Database::collection('dados'), $query);

        $list = [];

        foreach ($cursor as $document) {
            $array = (array) $document;
            $list[] = new Dados($array['codigo'], $array['nome'], $array['gasto'], $array['pai']);
        }

        return $list;
    }

    public function getDados_byFuncao($funcao){

        $data = $this->getDados_byPai($funcao);

        $allData = $data;


        if (!$allData) {
            return [];
        }

        $i = 0;
        $proximo = $allData[$i];
        $verifica = $this->getDados_byPai($proximo->getCodigo());
        while ( isset($verifica)){
            foreach (@$this->getDados_byPai($proximo->getCodigo()) as $ver){
                $allData[] = $ver;
            }
            $i++;
            if (isset($allData[$i])){
                $proximo = $allData[$i];
                @$verifica = $this->getDados_byPai($proximo->getCodigo());
            } else {
                $verifica = null;
            }

        }

        return $allData;

    }

    public function getAllFuncoes(){
        $query = new MongoDB\Driver\Query([]);
        $cursor =  $this->manager->executeQuery(Database::collection('funcoes'), $query);
        $list = [];

        foreach ($cursor as $document) {
            $array = (array) $document;
            $list[] = $array;
        }

        return $list;
    }
}