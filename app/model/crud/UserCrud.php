<?php

require_once __DIR__ . '/../../../config/Database.php';
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
        $this->manager = Database::manager();
    }

    public function getData($query){
        $query = new MongoDB\Driver\Query($query);
        $cursor =  $this->manager->executeQuery(Database::collection('user'), $query);

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
            return $user[0] ?? null;
        } else {
            return new User();
        }

    }

    public function getUser_byEmail($email){
        $user = $this->getData(['email' => $email]);

        return $user[0] ?? null;
    }

    public function add(User $user){

        $bulk = new MongoDB\Driver\BulkWrite;

        $allUsers = $this->getAllUser();

        $verifica = true;
        foreach ($allUsers as $oneUser){
            if ($oneUser->getLogin() == $user->getLogin()){
                $verifica = false;
            }



            if ($oneUser->getEmail() == $user->getEmail()){
                $verifica = false;
            }
        }

        if ($verifica){
            $bulk->insert($user->insert());

            $this->manager->executeBulkWrite(Database::collection('user'), $bulk);
            return true;

        } else {
            return false;
        }

    }

    public function delete($login){

        $bulk = new MongoDB\Driver\BulkWrite;

        $bulk->insert(['login' => $login]);

        $this->manager->executeBulkWrite(Database::collection('user'), $bulk);
    }

    public function update(User $user){

        $bulk = new MongoDB\Driver\BulkWrite;

        $bulk->update(['login' => $user->getLogin()], $user->update());

        $this->manager->executeBulkWrite(Database::collection('user'), $bulk);
    }
}
