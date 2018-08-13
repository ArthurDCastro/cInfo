<?php
/**
 * Created by PhpStorm.
 * User: Arthur Castro
 * Date: 03/08/2018
 * Time: 22:24
 */

class Comentarios
{
    private $user;
    private $comentarios;
    private $data;
    private $codigo;
    private $postagem;

    /**
     * Comentarios constructor.
     * @param $user
     * @param $comentario
     * @param $data
     */
    public function __construct($user = '', $comentario = '', $data = '', $codigo = '', $postagem = '')
    {
        $this->user = $user;
        $this->comentarios = $comentario;
        $this->data = $data;
        $this->codigo = $codigo;
        $this->postagem = $postagem;
    }

    public function insert(){
        return [
            'id'         => uniqid(),
            'user'       => $this->user,
            'comentario' => $this->comentarios,
            'postagem'   => $this->postagem,
            'data'       => $this->data
        ];
    }



    /**
     * @return string
     */
    public function getPostagem(): string
    {
        return $this->postagem;
    }

    /**
     * @param string $postagem
     */
    public function setPostagem(string $postagem): void
    {
        $this->postagem = $postagem;
    }

    /**
     * @return string
     */
    public function getCodigo(): string
    {
        return $this->codigo;
    }

    /**
     * @param string $codigo
     */
    public function setCodigo(string $codigo): void
    {
        $this->codigo = $codigo;
    }



    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }

    /**
     * @param mixed $comentario
     */
    public function setComentarios($comentario): void
    {
        $this->comentario = $comentario;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }


}