<?php
/**
 * Created by PhpStorm.
 * User: Arthur Castro
 * Date: 28/04/2018
 * Time: 15:05
 */

abstract class UserFunc
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login($password){
        if (crypt($password,$this->user->getPassword()) == $this->user->getPassword()){

            setcookie('login', $this->user->getLogin());

            return true;
        } else {
            return false;
        }
    }

    public function logout(){
        setcookie('login', $this->user->getLogin(),time()-1);
    }
}