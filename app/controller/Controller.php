<?php

/* Controlador de páginas
 *
 * Aqui você contruirá as suas páginas
 *
 * $data é um array onde voce pode colocar informações como título da pagina ou então id de um produto
*/

    require_once 'engine/Construct.php';

    class Controller extends Construct
    {
        public function error_404(){
            $data['titulo_pagina'] = 'cInfo - Error 404';
            $this->loadView('padroes/head.php', $data);
            $this->loadView('padroes/menu.php');
            $this->loadView('error_404.php', $data);
            $this->loadView('rodape.php');
        }

        public function index(){

            $data['titulo_pagina'] = 'cInfo - Bem Vindo';

            $data['bruno'] = 'bruno';

            $this->loadView('padroes/head.php', $data);
            $this->loadView('padroes/menu.php');
            $this->loadView('inicio.php', $data);
            $this->loadView('rodape.php');
        }

        public function sobre(){
            $data['titulo_pagina'] = 'cInfo - Sobre';
            $this->loadView('padroes/head.php', $data);
            $this->loadView('padroes/menu.php', $data);
            $this->loadView('sobre.php', $data);
            $this->loadView('rodape.php', $data);
        }

        public function cadastro(){
            $data['titulo_pagina'] = 'cInfo - Cadastro';

            if (isset($_POST['cadastro'])){
                $user = new User();
                $user->setLogin($_POST['nome_exib']);
                $user->setTipoUser('comum');
                $user->setEmail($_POST['email']);
                $user->setNome($_POST['nome']);
                $user->setPassword($_POST['password']);

                $this->user->crud->add($user);

                header('Location: login/new');
            } else {
                $this->loadView('padroes/head.php', $data);
                $this->loadView('cadastro.php', $data);
            }

        }

        public function crie(){
            $data['titulo_pagina'] = 'cInfo - Crie um Gráfico';

            $data['funcoes'] = $this->dados->crud->getAllFuncoes();
            if (isset($this->getDataUrl()[0])){
                $data['url'] = $this->getDataUrl();
            } else {
                $data['url'] = '';
            }


            $this->loadView('padroes/head.php', $data);
            $this->loadView('padroes/menu.php', $data);
            $this->loadView('crie.php', $data);
            $this->loadView('rodape.php', $data);
        }

        public function login(){
            $data['titulo_pagina'] = 'cInfo - Login';

            if (isset($_POST['email'])){
                $user = $this->user->crud->getUser_byEmail($_POST['email']);
                $this->user->getUserClass($user);
                if ($this->user->func->login($_POST['password'])){
                    header('Location: index');
                } else {
                    $login = $user->getLogin();
                    if(isset($login)){
                        $data['error'] = 'Senha inválida!';
                        $data['email'] = $login = $user->getEmail();
                    } else {
                        $data['error'] = 'Este email não é cadastrado!';
                    }
                    $this->loadView('padroes/head.php', $data);
                    $this->loadView('login.php', $data);
                }
            } else {
                $this->loadView('padroes/head.php', $data);
                $this->loadView('login.php', $data);
            }
        }

        public function logout(){
            $user = $this->user->crud->getUser_byLogin($_COOKIE['login']);
            $this->user->getUserClass($user);
            $this->user->func->logout();

            header('Location: login');
        }

        public function feed(){
            $data['titulo_pagina'] = 'cInfo - Feed';

            $seguidores = $this->seguidores->crud->getSeguindo_bySeguidor($_COOKIE['login']);

            $s = [];
            foreach ($seguidores as $seguidor){
                $s[] = $seguidor->getSeguindo()->getLogin();
            }

            $data['publicacoes'] = $this->postagem->crud->getPublicacoes_bySeguindo($s, $_COOKIE['login']);

            $this->loadView('padroes/head.php', $data);
            $this->loadView('padroes/menu.php', $data);
            $this->loadView('feed.php', $data);
            $this->loadView('rodape.php', $data);
        }

        public function post(){
            $url = $this->getDataUrl();
            $post = new Postagem($_COOKIE['login'], $url[0], $_POST['descricao'], [], [], date('Y-m-d H:i:s'));

            echo '<pre>';
            var_dump($post);
            echo '</pre>';
            $this->postagem->crud->add($post);

            header('Location: ../feed');
        }

        public function perfil(){
            $data['titulo_pagina'] = 'cInfo - Perfil';
            $data['url'] = @$this->getDataUrl();

            $data['user'] = $this->user->crud->getUser_byLogin($data['url'][0]);
            $data['graficos'] = $this->grafico->crud->getGraficos_byUser($data['user']->getLogin());
            $data['seguidores'] = $this->seguidores->crud->getSeguidores_bySeguindo($data['user']->getLogin());
            $data['seguindo'] = $this->seguidores->crud->getSeguindo_bySeguidor($data['user']->getLogin());

            if ($data['user']->getLogin() != $_COOKIE['login']){
                $data['relacao'] = $this->seguidores->crud->getRelacao($data['user']->getLogin(), $_COOKIE['login']);
            }

            $this->loadView('padroes/head.php', $data);
            $this->loadView('padroes/menu.php', $data);
            $this->loadView('perfil.php', $data);
            $this->loadView('rodape.php', $data);
        }

        public function addFoto()
        {
            $target_dir = "assets/files/img/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";

                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

            $image = $target_file; // the image to crop
            $dest_image = $target_file; // make sure the directory is writeable

            $org_img = imagecreatefromjpeg($image);

            if (imagesy($org_img) <= imagesx($org_img)){
                $size = imagesy($org_img);
            } else {
                $size = imagesx($org_img);
            }

            $img = imagecreatetruecolor($size,$size);
            $imsx = (imagesx($org_img) - $size)/2;
            $imsy = (imagesy($org_img) - $size)/2;
            echo 'size: ' . $size . ' y-x: ' . $imsy . '-' . $imsx;
            imagecopy($img,$org_img, 0, 0, $imsx, $imsy, $size, $size);
            imagejpeg($img,$dest_image,90);
            imagedestroy($img);

            if (file_exists($target_dir . 'foto-' . $_COOKIE['login'] . '.' . $imageFileType)) {
                unlink($target_dir . 'foto-' . $_COOKIE['login'] . '.' . $imageFileType);
                rename($target_file, $target_dir . 'foto-' . $_COOKIE['login'] . '.' . $imageFileType);
            } else {
                rename($target_file, $target_dir . 'foto-' . $_COOKIE['login'] . '.' . $imageFileType);
            }

            echo '<img src="' . $target_dir . 'foto-' . $_COOKIE['login'] . '.' . $imageFileType . '">';
        }




    }