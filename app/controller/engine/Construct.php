<?php
/*
 * Arquivo controlador
 *
 * Não editar
 */

    require_once 'GetClass.php';

    abstract class Construct{
        const DIRECTORY_VIEW = 'app/views/';
        private $url;
        private $padroes;
        private $base_url;
        protected $user;
        protected $dados;
        protected $grafico;
        protected $seguidores;
        protected $postagem;

        public function __construct()
        {
            $this->user = new GetClass('User');
            $this->dados = new GetClass('Dados');
            $this->grafico = new GetClass('Grafico');
            $this->seguidores = new GetClass('Seguidores');
            $this->postagem = new GetClass('Postagem');
        }

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

        protected function getDataUrl(){
            $data_url = explode('/',explode($this->base_url, $this->url)[1]);
            $count = count($data_url);

            $data['url'] = [];
            for ($i = 1; $i < $count; $i++){
                $data['url'][] = $data_url[$i];
            }

            return $data['url'];
        }

        protected function loadView($file, $data = ''){
            $data['url'] = $this->getDataUrl();
            $data['url_base'] = $this->base_url . '';

            foreach ($data as $key => $value ){
                if (is_string($value)){
                    eval('$' . $key . ' = \'' . $value . '\';');
                } /*elseif(is_array($value)) {
                    foreach ($value as $val){
                        if (is_string($val)){
                            eval('$' . $key . '[] = \'' . $val . '\';');
                        }
                    }
                }*/

            }

            include self::DIRECTORY_VIEW . $file;
        }

        protected function padroes($data = ''){
            $files = scandir(self::DIRECTORY_VIEW . $this->padroes, 0);

            foreach ($files as $file){
                $this->loadView($this->padroes . $file, $data);
            }
        }
    }