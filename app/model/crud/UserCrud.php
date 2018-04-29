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

    public function getAllUser(){
        $query = new MongoDB\Driver\Query([]);
        $cursor =  $this->manager->executeQuery('db_cinfo.user', $query);

        $list = [];

        foreach ($cursor as $document) {
            $array = (array) $document;
            $list[] = new User($array['tipo_user'], $array['login'], $array['password'], $array['nome'], $array['nome']);
        }

        return $list;
    }

    public function getUser_byLogin($login){
        $query = new MongoDB\Driver\Query(['login' => $login]);
        $cursor =  $this->manager->executeQuery('db_cinfo.user', $query);

        foreach ($cursor as $document) {
            $array = (array) $document;
        }

        return new User($array['tipo_user'], $array['login'], $array['password'], $array['nome'], $array['nome']);;
    }

    public function add(User $user){

        $bulk = new MongoDB\Driver\BulkWrite;

        $allUsers = $this->getAllUser();

        $verifica = true;
        foreach ($allUsers as $oneUser){
            if ($oneUser->getLogin() == $user->getLogin() or $oneUser->getEmail() == $user->getEmail()){
                $verifica = false;
            }
        }

        if ($verifica){
            $bulk->insert($user->insert());

            $this->manager->executeBulkWrite('db_cinfo.user', $bulk);
            echo '1';
            return true;

        } else {
            echo '0';
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

        $bulk->update(['login' => $user->getLogin()], $user->insert());

        $this->manager->executeBulkWrite('db_cinfo.user', $bulk);
    }
}
