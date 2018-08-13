<?php
/**
 * Created by PhpStorm.
 * User: Arthur Castro
 * Date: 09/08/2018
 * Time: 21:56
 */

require_once '../model/crud/DadosCrud.php';
require_once '../model/crud/GraficoCrud.php';
require_once '../model/crud/UserCrud.php';
require_once '../model/crud/SeguidoresCrud.php';
require_once '../model/crud/PostagemCrud.php';

require_once '../model/create/Grafico.php';
require_once '../model/create/Dados.php';
require_once '../model/create/User.php';
require_once '../model/create/Seguidores.php';
require_once '../model/create/Comentarios.php';
require_once '../model/create/Postagem.php';


switch ($_POST['acao']){
    case 'comentar':
        $postagem = new PostagemCrud();
        $coment = new Comentarios();

        $post = $postagem->getPublicacao_byCodigo($_POST['vals']['postagem']);

        $coment->setUser($_COOKIE['login']);
        var_dump($_POST['vals']['comentario']);
        $coment->setComentarios($_POST['vals']['comentario']);
        $coment->setData(date('Y-m-d H:i:s'));
        $coment->setCodigo(uniqid());

        $post->setComentario($coment);

        echo '<pre>';
        var_dump($post->getComentarios());
        echo '</pre>';

        $postagem->update($post);

        break;
}