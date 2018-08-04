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
    case 'perfil':

        break;

    case 'graficos':
        $data['graficos'] = [
            [
                "nome"  => "Gráfico sobre Saúde",
                "data"  => "22/07/18",
                "user"  => "ohperes",
                "dados" => [
                    "nome"  => "mec",
                    "valor" => "104290580220.5"
                ],[
                "nome"  => "saude",
                "valor" => "42727319637.21"
            ]
            ],
            [
                "nome"  => "Gráfico sobre Educação",
                "data"  => "28/07/18",
                "user"  => "Tekislla",
                "dados" => [
                    "nome"  => "educacao",
                    "valor" => "534290589480.5"
                ],[
                "nome"  => "salario",
                "valor" => "323232323232.21"
            ]
            ],
            [
                "nome"  => "Gráfico sobre Batata",
                "data"  => "12/07/12",
                "user"  => "TukLukDuk",
                "dados" => [
                    "nome"  => "educacao",
                    "valor" => "534290589480.5"
                ],[
                "nome"  => "salario",
                "valor" => "323232323232.21"
            ]
            ],
            [
                "nome"  => "Gráfico sobre Capivaras",
                "data"  => "66/07/18",
                "user"  => "Joãozin",
                "dados" => [
                    "nome"  => "educacao",
                    "valor" => "534290589480.5"
                ],[
                "nome"  => "salario",
                "valor" => "323232323232.21"
            ]
            ],
            [
                "nome"  => "Gráfico Inutil",
                "data"  => "00/00/00",
                "user"  => "souUmMerda",
                "dados" => [
                    "nome"  => "educacao",
                    "valor" => "534290589480.5"
                ],[
                "nome"  => "salario",
                "valor" => "323232323232.21"
            ]
            ],
            [
                "nome"  => "Gráfico sobre GAMES",
                "data"  => "42/07/42",
                "user"  => "dudu_GAMER",
                "dados" => [
                    "nome"  => "educacao",
                    "valor" => "534290589480.5"
                ],[
                "nome"  => "salario",
                "valor" => "323232323232.21"
            ]
            ],

        ];
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
        echo '<b>editar</b>';
        break;
}