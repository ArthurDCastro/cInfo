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
    private $comentario;
    private $data;
    private $codigo;
    private $postagem;

    /**
     * Comentarios constructor.
     * @param $user
     * @param $comentarios
     * @param $data
     * @param $codigo
     * @param $postagem
     */
    public function __construct($user = '', $comentarios = '', $data = '', $codigo = '', $postagem = '')
    {
        $this->user = $user;
        $this->comentario = $comentarios;
        $this->data = $data;
        $this->codigo = $codigo;
        $this->postagem = $postagem;
    }


    public function insert(){
        return [
            'id'         => uniqid(),
            'user'       => $this->user,
            'comentario' => $this->comentario,
            'postagem'   => $this->postagem,
            'data'       => $this->data
        ];
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getComentario(): string
    {
        return $this->comentario;
    }

    /**
     * @param string $comentario
     */
    public function setComentario(string $comentario): void
    {
        $this->comentario = $comentario;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @param string $data
     */
    public function setData(string $data): void
    {
        $this->data = $data;
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

}