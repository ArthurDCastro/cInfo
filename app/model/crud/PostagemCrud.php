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

    protected function getData($query){
        $query = new MongoDB\Driver\Query($query);
        $cursor =  $this->manager->executeQuery('db_cinfo.postagem', $query);

        $list = [];
        foreach ($cursor as $document) {
            $array = (array) $document;

            $userCrud = new UserCrud();
            $user = $userCrud->getUser_byLogin($array['user']);
            
            $grafico = new GraficoCrud();
            $grafico = $grafico->getGraficos_byCodigo($array['grafico']);

            $comentarios = [];
            foreach ((array) $array['comentarios'] as $comenta){
                $comentario = new Comentarios();
                $coment = (array) $comenta;
                $comentario->setUser($userCrud->getUser_byLogin($coment['user']));
                $comentario->setComentario($coment['text']);
                $comentario->setData($coment['data']);
                $comentario->setCodigo($coment['codigo']);
                $comentarios[] = $comentario;
            }

            usort($comentarios, function ($a, $b) {
                return $a->getData() < $b->getData();
            });

            $like = (array) $array['like'];

            $list[] = new Postagem($user, $grafico, $array['descricao'], $comentarios, $like, $array['data'], $array['codigo']);
        }

        usort($list, function ($a, $b) {
            return $a->getData() < $b->getData();
        });

        return $list;

    }

    public function getAllData(){
        return $this->getData([]);
    }

    public function getPublicacoes_bySeguindo(array $seguidores, $user){
        $list = [];
        $seguidores[] = $user;

        foreach ($seguidores as $seguidor){
            $data = $this->getData(['user' => trim($seguidor)]);
            if (count($data) >= 1){
                foreach ($data as $dt){
                    $list[] = $dt;
                }
            }
        }

        usort($list, function ($a, $b) {
            return $a->getData() < $b->getData();
        });

        if (isset($list[0])){
            return $list;
        } else {
            return null;
        }
    }

    public function getPublicacoes_byUser($user){
        return $this->getData(['user' => $user]);
    }

    public function getPublicacoes_byChar($char){
        return $this->getData(['grafico' => $char]);
    }

    public function getPublicacao_byCodigo($codigo){
        if (isset($this->getData(['codigo' => $codigo])[0])){
            return $this->getData(['codigo' => $codigo])[0];
        } else {
            return null;
        }
    }

    public function add(Postagem $postagem){

        $bulk = new MongoDB\Driver\BulkWrite;

        $bulk->insert($postagem->insert());

        $this->manager->executeBulkWrite('db_cinfo.postagem', $bulk);
    }

    public function update(Postagem $postagem){

        $bulk = new MongoDB\Driver\BulkWrite;

        $bulk->update(['codigo' => $postagem->getCodigo()], $postagem->insert());

        $this->manager->executeBulkWrite('db_cinfo.postagem', $bulk);
    }


    public function delete($codigo)
    {

        $bulk = new MongoDB\Driver\BulkWrite;

        $bulk->delete(['codigo' => $codigo]);

        $this->manager->executeBulkWrite('db_cinfo.postagem', $bulk);
    }

}