<?php
/**
 * Created by PhpStorm.
 * User: Arthur Castro
 * Date: 26/11/2018
 * Time: 23:58
 */


require_once '../model/crud/UserCrud.php';

require_once '../model/create/User.php';

switch ($_POST['acao']){
    case 'user':
        $val = strtolower($_POST['vals']);
        $users = new UserCrud();
        $users = $users->getAllUser();

        $encontrados = [];


        foreach ($users as $user){
            $login = strtolower($user->getLogin());
            $name  = strtolower($user->getNome());

            $countSearch = strlen($val);
            $countLogin  = strlen($login);
            $countName   = strlen($name);

            $strLogin = '';
            $strName  = '';
            for ($i = 0; $i < $countSearch; $i++){
                if (isset($login[$i])){
                    $strLogin = $strLogin . $login[$i];
                }

                if (isset($name[$i])){
                    $strName = $strName . $name[$i];
                }
            }

            if ($user->getFoto() == ''){
                $user->setFoto('assets/files/img/image.jpg');
            }

            if ($strLogin == $val){
                $encontrados[] = [
                    'login'  => $user->getLogin(),
                    'nome'   => $user->getNome(),
                    'foto'   => $user->getFoto(),
                    'metodo' => 'login'
                ];
            } elseif ($strName == $val){
                $encontrados[] = [
                    'login'  => $user->getLogin(),
                    'nome'   => $user->getNome(),
                    'foto'   => $user->getFoto(),
                    'metodo' => 'name'
                ];
            }
        }

        $vals = json_encode($encontrados);
        header("Conten-type: application/json");
        echo $vals;
        break;
}