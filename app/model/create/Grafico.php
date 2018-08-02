<?php
/**
 * Created by PhpStorm.
 * User: Arthur Castro
 * Date: 28/04/2018
 * Time: 15:01
 */

class Grafico
{
    private $titulo;
    private $tipo;
    private $user;
    private $data;
    private $dados;

    public function __construct($titulo = '', $tipo = '', $user = '', $data = '', $dados = [])
    {
        $this->titulo = $titulo;
        $this->tipo   = $tipo;
        $this->user   = $user;
        $this->data   = $data;
        $this->dados  = $dados;
    }

    public function insert(){
        return [
            '_id'    => new MongoDB\BSON\ObjectId,
            'titulo' => $this->titulo,
            'tipo'   => $this->tipo,
            'user'   => $this->user,
            'data'   => $this->data,
            'dados'  => $this->dados
        ];
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo): void
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
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

    /**
     * @return mixed
     */
    public function getDados()
    {
        return $this->dados;
    }

    /**
     * @param mixed $dados
     */
    public function setDados($dados): void
    {
        $this->dados = $dados;
    }



}