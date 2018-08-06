<?php

class SeguidoresCrud
{

    protected $manager;

    public function __construct()
    {
        $this->manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    }

    public function getData(array $query){
        $query = new MongoDB\Driver\Query($query);
        $cursor =  $this->manager->executeQuery('db_cinfo.seguidores', $query);

        $list = [];

        foreach ($cursor as $document) {
            $array = (array) $document;

            $user = new UserCrud();
            $seguidor = $user->getUser_byLogin($array['seguidor']);
            $seguindo = $user->getUser_byLogin($array['seguindo']);

            $list[] = new Seguidores($seguidor, $seguindo, $array['dti'], $array['dtf']);
        }

        return $list;
    }

    public function getAllData(){
        return $this->getData([]);
    }

    public function getSeguindo_bySeguidor($seguidor){
            return $this->getData(['seguidor' => $seguidor]);
    }

    public function getSeguidores_bySeguindo($seguindo){
        return $this->getData(['seguindo' => $seguindo]);
    }

    public function getRelacao($seguindo, $seguidor){
        if (isset($this->getData(['seguindo' => $seguindo, 'seguidor' => $seguidor])[0])) {
            return $this->getData(['seguindo' => $seguindo, 'seguidor' => $seguidor])[0];
        } else {
            return new Seguidores(new User(), new User());
        }
    }

    public function getSeguidores_byDti($dti){
        return $this->getData(['dti' => $dti]);
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
