<?php
/**
 * Created by PhpStorm.
 * User: Arthur Castro
 * Date: 27/04/2018
 * Time: 23:45
 */

class UserCrud
{

    protected $manager;

    public function __construct()
    {
        $this->manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    }

    public function getData($query){
        $query = new MongoDB\Driver\Query($query);
        $cursor =  $this->manager->executeQuery('db_cinfo.user', $query);

        $list = [];

        foreach ($cursor as $document) {
            $array = (array) $document;
            $list[] = new User($array['tipo_user'], $array['login'], $array['password'], $array['nome'], $array['email'], $array['foto'], $array['bio']);
        }

        return $list;
    }

    public function getAllUser(){
        return $this->getData([]);
    }

    public function getUser_byLogin($login){
        $user = $this->getData(['login' => trim($login)]);

        if (isset($user[0])){
            return $user[0];
        } else {
            return new User();
        }

    }

    public function getUser_byEmail($email){
        $user = $this->getData(['email' => $email]);

        return $user[0];
    }

    public function add(User $user){

        $bulk = new MongoDB\Driver\BulkWrite;

        $allUsers = $this->getAllUser();

        $verifica = true;
        foreach ($allUsers as $oneUser){
            if ($oneUser->getLogin() == $user->getLogin()){
                $verifica = false;
            }

            echo $oneUser->getEmail() .'   ///   '. $user->getEmail();

            if ($oneUser->getEmail() == $user->getEmail()){
                $verifica = false;
            }
        }

        if ($verifica){
            $bulk->insert($user->insert());

            $this->manager->executeBulkWrite('db_cinfo.user', $bulk);
            return true;

        } else {
            return false;
        }

    }

    public function delete($login){

        $bulk = new MongoDB\Driver\BulkWrite;

        $bulk->insert(['login' => $login]);

        $this->manager->executeBulkWrite('db_cinfo.user', $bulk);
    }

    public function update(User $user){

        $bulk = new MongoDB\Driver\BulkWrite;

        $bulk->update(['login' => $user->getLogin()], $user->update());

        $this->manager->executeBulkWrite('db_cinfo.user', $bulk);
    }
}
