<?php
/**
 * Created by PhpStorm.
 * User: Arthur Castro
 * Date: 28/04/2018
 * Time: 15:01
 */

class Dados
{

    private $codigo;
    private $nome;
    private $gasto;
    private $pai;

    public function __construct($codigo = '', $nome = '', $gasto = '', $pai = '')
    {
        $this->codigo = $codigo;
        $this->nome   = $nome;
        $this->gasto  = $gasto;
        $this->pai    = $pai;
    }

    /**
     * @return string
     */
    public function getCodigo(): string
    {
        return $this->codigo;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @return string
     */
    public function getGasto(): string
    {
        return $this->gasto;
    }

    /**
     * @return string
     */
    public function getPai(): string
    {
        return $this->pai;
    }

}