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

require_once '../model/create/Grafico.php';
require_once '../model/create/Dados.php';
require_once '../model/create/User.php';
require_once '../model/create/Seguidores.php';


switch ($_POST['acao']){

    case 'perfil':
        $crud = new UserCrud();
        $data['user'] = $crud->getUser_byLogin($_POST['user']);
        include "../views/perfil_usuario.php";
    break;

    case 'graficos':
    $crud = new GraficoCrud();
    $graficos = $crud->getGraficos_byUser($_POST['user']);


    include "../views/graficos.php";
    break;

    case 'excluir':
        $crud = new GraficoCrud();

        $crud->delete($_POST['id']);

        $graficos = $crud->getGraficos_byUser($_POST['user']);

        include "../views/graficos.php";
        break;

    case 'seguidores':
        $crud = new SeguidoresCrud();

        $segue = $crud->getSeguidores_bySeguindo($_POST['user']);

        include "../views/seguidores.php";
        break;

    case 'seguindo':
        $crud = new SeguidoresCrud();

        $segue = $crud->getSeguindo_bySeguidor($_POST['user']);

        include "../views/seguindo.php";
        break;

    case 'editar':
        include "../views/editar_perfil.php";
        break;

    case 'individual':
        $crud = new GraficoCrud();
        $grafico = $crud->getGraficos_byCodigo($_POST['id']);

        include "../views/grafico_individual.php";
        break;

    case 'relacao':
        $crud = new SeguidoresCrud();
        $relacao = $crud->getRelacao($_POST['user'], $_COOKIE['login']);
        $seg = $relacao->getSeguidor();
        $dtf = $relacao->getDtf();

        if (isset($seg) and !isset($dtf)){
            echo $seg->getLogin() . ' - ' . $dtf;
            echo true;
        } else {
            echo false;
        }
        break;

}