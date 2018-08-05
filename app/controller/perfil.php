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

switch ($_POST['acao']){
    case 'perfil':
        include "../views/perfil_usuario.php";
        break;

    case 'graficos':
        $crud = new GraficoCrud();
        $graficos = $crud->getGraficos_byUser($_COOKIE['login']);


        include "../views/graficos.php";
        break;

    case 'seguidores':
        $data['seguidores'] = [
            [
                "nome"       => "Brayn Mayke",
                "dt_comeco"  => "19/08/18",
                "user"       => "Bryant",
                "foto"       => "assets/files/img/maykinho.jpg",
            ],
            [
                "nome"       => "PAAS Henrique",
                "dt_comeco"  => "13/12/18",
                "user"       => "PAAS",
                "foto"       => "assets/files/img/henriquinho.jpg",
            ],
            [
                "nome"       => "Luiz Fhynbeen Bruno",
                "dt_comeco"  => "11/10/18",
                "user"       => "feio",
                "foto"       => "assets/files/img/bruninho.jpg",
            ],
            [
                "nome"       => "Castro Viana Dias de Arthur",
                "dt_comeco"  => "77/08/18",
                "user"       => "LukDuk",
                "foto"       => "assets/files/img/castrinho3.jpg",
            ],
            [
                "nome"       => "Souza Pedro Lazarim de João",
                "dt_comeco"  => "23/11/18",
                "user"       => "Tekislalsa",
                "foto"       => "assets/files/img/lazinha.jpg",
            ],
            [
                "nome"       => "Peres Vinícius",
                "dt_comeco"  => "24/10/18",
                "user"       => "ohhhperes",
                "foto"       => "assets/files/img/peresinho.jpg",
            ],

        ];
        include "../views/seguidores.php";
        break;

    case 'seguindo':
        echo '<b>seguindo</b>';
        break;

    case 'editar':
        include "../views/editar_perfil.php";
        break;
}