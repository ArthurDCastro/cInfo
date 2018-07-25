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
    private $funcao;

    public function __construct($codigo = '', $nome = '', $gasto = '', $pai = '', $funcao = '')
    {
        $this->codigo = $codigo;
        $this->nome   = $nome;
        $this->gasto  = $gasto;
        $this->pai    = $pai;
        $this->funcao = $funcao;
    }

    public function get_array(){
        return [
            $this->codigo,
            $this->nome,
            $this->gasto,
            $this->pai,
            $this->funcao
        ];
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

    /**
     * @return string
     */
    public function getFuncao(): string
    {
        return $this->funcao;
    }

    /**
     * @param string $funcao
     */
    public function setFuncao(string $funcao): void
    {
        $this->funcao = $funcao;
    }


}