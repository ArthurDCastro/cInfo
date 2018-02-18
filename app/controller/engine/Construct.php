<?php
/*
 * Arquivo controlador
 *
 * Não editar
 */
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
         * @param mixed $padroes
         */
        public function setPadroes($padroes)
        {
            $this->padroes = $padroes;
        }

        public function constroi($acao, $class){
            return $class . '->' . $acao . '();';
        }

        protected function loadView($file, $data = ''){
            @include self::DIRECTORY_VIEW . $file;
        }

        public function padroes($data = ''){
            $files = scandir(self::DIRECTORY_VIEW . $this->padroes, 0);

            foreach ($files as $file){
                $this->loadView($this->padroes . $file, $data);
            }
        }
    }