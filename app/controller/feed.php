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

date_default_timezone_set('America/Sao_Paulo');


switch ($_POST['acao']){
    case 'comentar':
        $postagem = new PostagemCrud();
        $user = new UserCrud();
        $coment = new Comentarios();

        $post = $postagem->getPublicacao_byCodigo($_POST['vals']['postagem']);

        $coment->setUser($user->getUser_byLogin($_COOKIE['login']));
        $coment->setComentario($_POST['vals']['comentario']);
        $coment->setData(date('Y-m-d H:i:s'));
        $coment->setCodigo(uniqid());

        $post->setComentario($coment);

        $postagem->update($post);

        foreach ($post->getComentarios() as $comentario): ?>
            <div class="comment">
                <a class="avatar">
                    <?php if ($comentario->getUser()->getFoto() != ''): ?>
                        <img src="<?= $comentario->getUser()->getFoto() ?>" style=" height: auto">
                    <?php else: ?>
                        <img src="assets/files/img/image.png" style=" height: auto">
                    <?php endif; ?>
                </a>
                <div class="content">
                    <a class="author"><?= $comentario->getUser()->getLogin() ?></a>
                    <div class="metadata">
                        <span class="date"><?= $comentario->getData() ?></span>
                    </div>
                    <div class="text">
                        <?= $comentario->getComentario() ?>
                    </div>
                    <div class="meta">
                    </div>
                </div>
            </div>
        <?php endforeach;
        break;

    case 'like-post':
        $postagem = new PostagemCrud();

        $post = $postagem->getPublicacao_byCodigo($_POST['vals']['postagem']);

        $verifica = true;
        if (count($post->getLike()) > 0){
            foreach ($post->getLike() as $user_like){
                if ($_COOKIE['login'] == $user_like){
                    $verifica = false;
                }
            }
        }


        if ($verifica){
            $post->addLike($_COOKIE['login']);
            $resposta = 'like';
        } else {
            $post->removeLike($_COOKIE['login']);
            $resposta = 'unlike';
        }

        $postagem->update($post);

        $like = [
            'count' => count($post->getLike()),
            'users' => $post->getLike(),
            'resposta' => $resposta
        ];

        $like = json_encode($like);

        header("Conten-type: application/json");

        echo $like;

        break;
}