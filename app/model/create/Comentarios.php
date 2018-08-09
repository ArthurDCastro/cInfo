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

    /**
     * Comentarios constructor.
     * @param $user
     * @param $comentario
     * @param $data
     */
    public function __construct($user = '', $comentario = '', $data = '', $codigo = '')
    {
        $this->user = $user;
        $this->comentario = $comentario;
        $this->data = $data;
        $this->codigo = $codigo;
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
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * @param mixed $comentario
     */
    public function setComentario($comentario): void
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