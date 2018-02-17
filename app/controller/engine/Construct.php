<?php

class Construct
{
    const DIRECTORY_VIEW = 'app/views/';
    private $url;
    private $padroes;

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @param mixed $standards
     */
    public function setPadroes($padroes)
    {
        $this->padroes = $padroes;
    }

    public function constroi($acao, $class){
        return $class . '->' . $acao . '();';
    }

    public function loadView($file, $data = ''){
        @include self::DIRECTORY_VIEW . $file;
    }

    public function pattern($data = ''){
        $files = scandir(self::DIRECTORY_VIEW . $this->padroes, 0);

        foreach ($files as $file){
            $this->view($this->padroes . $file, $data);
        }
    }
}