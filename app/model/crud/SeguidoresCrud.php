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

            if ($array['dtf'] == ''){
                $user = new UserCrud();
                $seguidor = $user->getUser_byLogin($array['seguidor']);
                $seguindo = $user->getUser_byLogin($array['seguindo']);

                $list[] = new Seguidores($seguidor, $seguindo, $array['dti'], $array['dtf'], $array['id']);
            }

        }

        return $list;
    }

    public function getAllData(){
        return $this->getData([]);
    }

    public function getSeguindo_bySeguidor($seguidor){
            return $this->getData(['seguidor' => trim($seguidor)]);
    }

    public function getSeguidores_bySeguindo($seguindo){
        return $this->getData(['seguindo' => trim($seguindo)]);
    }

    public function getRelacao($seguindo, $seguidor){

        foreach ($this->getData(['seguindo' => $seguindo, 'seguidor' => $seguidor]) as $dado){
            $dtf = $dado->getDtf();
            if ($dtf == ''){
                $fim = $dado;
            }
        }
        if (isset($fim)) {
            return $fim;
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

    public function delete(Seguidores $seguidores){

        $bulk = new MongoDB\Driver\BulkWrite;

        $bulk->update(['id' => $seguidores->getId()], $seguidores->insert());

        $this->manager->executeBulkWrite('db_cinfo.seguidores', $bulk);
    }

    public function update(Seguidores $seguidores){

        $bulk = new MongoDB\Driver\BulkWrite;

        $bulk->update(['id' => $seguidores->getId()], $seguidores->insert());

        $this->manager->executeBulkWrite('db_cinfo.seguidores', $bulk);
    }


}
