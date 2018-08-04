<?php
/**
 * Created by PhpStorm.
 * User: Arthur Castro
 * Date: 03/08/2018
 * Time: 22:27
 */

class PostagemCrud
{
    private $manager;

    public function __construct()
    {
        $this->manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    }

    public function getAllData(){
        $query = new MongoDB\Driver\Query([]);
        $cursor =  $this->manager->executeQuery('db_cinfo.postagem', $query);

        $list = [];

        foreach ($cursor as $document) {
            $array = (array) $document;

            $user = new UserCrud();
            $user = $user->getUser_byLogin($array['user']);

            $grafico = new GraficoCrud();
            $grafico = $grafico->getGraficos_byCodigo($array[$grafico]);

            $list[] = new Postagem($user, $grafico, $array['descricao'], );
        }

        return $list;
    }
}