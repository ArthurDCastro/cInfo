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

require_once '../model/create/Dados.php';

switch ($_POST['acao']){
    case 'peril':
        echo '<b>perfil</b>';
        break;

    case 'graficos':
        echo '<b>graficos</b>';
        break;

    case 'seguidores':
        echo '<b>seguidores</b>';
        break;

    case 'seguindo':
        echo '<b>seguindo</b>';
        break;

    case 'editar':
        echo '<b>editar</b>';
        break;
}