<?php
/**
 * Created by PhpStorm.
 * User: Arthur Castro
 * Date: 03/08/2018
 * Time: 21:33
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
require_once '../model/create/Postagem.php';
require_once '../model/create/Comentarios.php';

date_default_timezone_set('America/Sao_Paulo');


switch ($_POST['acao']){

    case 'perfil':
        $crud = new UserCrud();
        $crudPostagem = new PostagemCrud();

        $data['user'] = $crud->getUser_byLogin($_POST['user']);

        $data['publicacoes'] = $crudPostagem->getPublicacoes_byUser($data['user']->getLogin());

        include "../views/perfil_usuario.php";
    break;

    case 'graficos':
    $crud = new GraficoCrud();
    $crudUser = new UserCrud();
    $data['user'] = $crudUser->getUser_byLogin(trim($_POST['user']));
    $graficos = $crud->getGraficos_byUser(trim($_POST['user']));

    include "../views/graficos.php";
    break;

    case 'excluir':
        $crud = new GraficoCrud();
        $crudUser = new UserCrud();
        $data['user'] = $crudUser->getUser_byLogin(trim($_POST['user']));

        if ($data['user']->getLogin() == $_COOKIE['login']){
            $crud->delete($_POST['id']);
        }

        $graficos = $crud->getGraficos_byUser(trim($_POST['user']));

        include "../views/graficos.php";
        break;

    case 'seguidores':
        $crud = new SeguidoresCrud();

        $segue = $crud->getSeguidores_bySeguindo(trim($_POST['user']));

        include "../views/seguidores.php";
        break;

    case 'seguindo':
        $crud = new SeguidoresCrud();

        $segue = $crud->getSeguindo_bySeguidor(trim($_POST['user']));

        include "../views/seguindo.php";
        break;

    case 'editar':
        $userCrud = new UserCrud();
        $data['user'] = $userCrud->getUser_byLogin($_COOKIE['login']);
        include "../views/editar_perfil.php";
        break;

    case 'individual':
        $crud = new GraficoCrud();
        $grafico = $crud->getGraficos_byCodigo($_POST['id']);

        include "../views/grafico_individual.php";
        break;

    case 'relacao':
        $crud = new SeguidoresCrud();
        $relacao = $crud->getRelacao(trim($_POST['user']), $_COOKIE['login']);
        $seguidor = $relacao->getSeguidor()->getLogin();
        $dtf = $relacao->getDtf();

        if ($seguidor != '' and $dtf == '' and $_POST['val'] == 'unfollow'){
            $relacao->setDtf(date('Y-m-d H:i:s'));
            $crud->delete($relacao);
            echo 'unfollow';
        } elseif (($seguidor == '' or  $dtf != '') and $_POST['val'] == 'follow') {
            $crudUser = new UserCrud();
            $relacao->setId(uniqid());
            $relacao->setSeguidor($crudUser->getUser_byLogin($_COOKIE['login']));
            $relacao->setSeguindo($crudUser->getUser_byLogin(trim($_POST['user'])));
            $relacao->setDti(date('Y-m-d H:i:s'));
            $relacao->setDtf('');
            $crud->add($relacao);
            echo 'follow';
        }
        break;

}