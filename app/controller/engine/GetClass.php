<?php
/**
 * Created by PhpStorm.
 * User: Arthur Castro
 * Date: 30/04/2018
 * Time: 20:28
 */

class GetClass
{
    public $crud;
    public $func;

    public function __construct($model)
    {
        require_once 'app/model/create/' . $model . '.php';
        require_once 'app/model/crud/' . $model . 'Crud.php';
        @eval('$this->crud = new ' . $model . 'Crud();');
    }

    public function getUserClass(User $user){
        require_once 'app/model/UserFunc.php';

        if ($user->getTipoUser() == 'admin'){
            require_once 'app/model/Admin.php';
            $this->func = new Admin($user);
        } else {
            require_once 'app/model/Comum.php';
            $this->func = new Comum($user);
        }
    }
}