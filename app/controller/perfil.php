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
        include "../views/perfil_usuario.php";
        break;

    case 'graficos':
    $crud = new GraficoCrud();
    $graficos = $crud->getGraficos_byUser($_COOKIE['login']);


    include "../views/graficos.php";
    break;

    case 'excluir':
        $crud = new GraficoCrud();

        $crud->delete($_POST['id']);

        $graficos = $crud->getGraficos_byUser($_COOKIE['login']);

        include "../views/graficos.php";
        break;

    case 'seguidores':
        $crud = new SeguidoresCrud();

        $segue = $crud->getSeguidores_bySeguindo($_COOKIE['login']);

        include "../views/seguidores.php";
        break;

    case 'seguindo':
        $crud = new SeguidoresCrud();

        $segue = $crud->getSeguindo_bySeguidor($_COOKIE['login']);

        include "../views/seguindo.php";
        break;

    case 'editar':
        include "../views/editar_perfil.php";
        break;
}