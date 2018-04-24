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
        private $base_url;

        /**
         * @param mixed $base_url
         */
        public function setBaseUrl($base_url)
        {
            $this->base_url = $base_url;
        }


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

        private function getDataUrl(){
            $data_url = explode('/',explode($this->base_url, $this->url)[1]);
            $count = count($data_url);

            $data['url'] = [];
            for ($i = 2; $i < $count; $i++){
                $data['url'][] = $data_url[$i];
            }

            return $data['url'];
        }

        protected function loadView($file, $data = ''){
            $data['url'] = @$this->getDataUrl();
            $data['url_base'] = $this->base_url . 'cinfo/';

            @include self::DIRECTORY_VIEW . $file;
        }

        public function padroes($data = ''){
            $files = scandir(self::DIRECTORY_VIEW . $this->padroes, 0);

            foreach ($files as $file){
                $this->loadView($this->padroes . $file, $data);
            }
        }
    }