<?php

require_once 'engine/Construct.php';

class Controller extends Construct
{
    public $caminho = '';

    public function index(){
        $data['titulo_pagina'] = 'bla';
        $this->loadView('inicio.php', $data);
    }
}