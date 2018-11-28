<?php
/**
 * Created by PhpStorm.
 * User: Arthur Castro
 * Date: 27/04/2018
 * Time: 14:19
 */

class User
{
    private $tipo_user;
    private $login;
    private $password;
    private $nome;
    private $email;
    private $foto;
    private $bio;

    public function __construct($tipo_user = '', $login = '', $password = '', $nome = '', $email = '', $foto = '', $bio = '')
    {
        $this->tipo_user = $tipo_user;
        $this->login = $login;
        $this->password = $password;
        $this->nome = $nome;
        $this->email = $email;
        $this->foto = $foto;
        $this->bio = $bio;
    }

    public function insert(){
        return [
            'nome'      => $this->nome,
            'login'     => $this->login,
            'tipo_user' => $this->tipo_user,
            'password'  => crypt($this->password),
            'email'     => $this->email,
            'foto'      => $this->foto,
            'bio'      => $this->bio
        ];
    }

    public function update(){
        return [
            'nome'      => $this->nome,
            'login'     => $this->login,
            'tipo_user' => $this->tipo_user,
            'password'  => $this->password,
            'email'     => $this->email,
            'foto'      => $this->foto,
            'bio'      => $this->bio
        ];
    }

    public function array(){
        return [
            'nome'      => $this->nome,
            'login'     => $this->login,
            'tipo_user' => $this->tipo_user,
            'email'     => $this->email,
            'foto'      => $this->foto,
            'bio'      => $this->bio
        ];
    }

    /**
     * @return mixed
     */
    public function getTipoUser()
    {
        return $this->tipo_user;
    }

    /**
     * @param mixed $tipo_user
     */
    public function setTipoUser($tipo_user): void
    {
        $this->tipo_user = $tipo_user;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login): void
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getFoto(): string
    {
        return $this->foto;
    }

    /**
     * @param string $foto
     */
    public function setFoto(string $foto): void
    {
        $this->foto = $foto;
    }

    /**
     * @return mixed
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @param mixed $bio
     */
    public function setBio($bio): void
    {
        $this->bio = $bio;
    }





}