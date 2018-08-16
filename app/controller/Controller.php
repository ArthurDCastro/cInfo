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

        public function error_permissao(){
            $data['titulo_pagina'] = 'cInfo - Error 404';
            $this->loadView('padroes/head.php', $data);
            $this->loadView('padroes/menu.php');
            $this->loadView('error_404.php', $data);
            $this->loadView('rodape.php');
        }

        public function index(){

            $data['titulo_pagina'] = 'cInfo - Bem Vindo';

            $data['grafico'] = new Grafico();
            $data['grafico'] = $this->grafico->crud->getGraficos_byCodigo('5b74b7c266d86');
            $data['grafico2'] = $this->grafico->crud->getGraficos_byCodigo('5b74f14f9c60d');
            $data['grafico3'] = $this->grafico->crud->getGraficos_byCodigo('5b74f94cea165');

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
            if (!isset($_COOKIE['login'])){
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
            } else {
                header('Location: error_permissao');
            }
        }

        public function login(){
            if (!isset($_COOKIE['login'])){
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
            } else {
                header('Location: error_permissao');
            }
        }

        public function logout(){
            if (isset($_COOKIE['login'])){
                $user = $this->user->crud->getUser_byLogin($_COOKIE['login']);
                $this->user->getUserClass($user);
                $this->user->func->logout();

                header('Location: login');
            } else {
                header('Location: error_permissao');
            }
        }

        public function crie(){
            if (isset($_COOKIE['login'])){
                $data['titulo_pagina'] = 'cInfo - Crie um Gráfico';

                $data['funcoes'] = $this->dados->crud->getAllFuncoes();
                if (isset($this->getDataUrl()[0])){
                    $data['url'] = $this->getDataUrl();
                    $data['grafico'] = $this->grafico->crud->getGraficos_byCodigo($data['url'][0]);
                } else {
                    $data['url'] = '';
                    $data['grafico'] = new grafico();
                }

                $this->loadView('padroes/head.php', $data);
                $this->loadView('padroes/menu.php', $data);
                $this->loadView('crie.php', $data);
                $this->loadView('rodape.php', $data);
            } else {
                header('Location: error_permissao');
            }

        }

        public function feed(){
            if (isset($_COOKIE['login'])){
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
            } else {
                header('Location: error_permissao');
            }

        }

        public function post(){
            if (isset($_COOKIE['login'])){
                $url = $this->getDataUrl();
                $user = $this->user->crud->getUser_byLogin($_COOKIE['login']);
                $grafico = $this->grafico->crud->getGraficos_byCodigo($url[0]);
                $post = new Postagem($user, $grafico, $_POST['descricao'], [], [], date('Y-m-d H:i:s'), uniqid());

                $this->postagem->crud->add($post);

                header('Location: ../feed');
            } else {
                header('Location: error_permissao');
            }
        }

        public function perfil($user = ''){
            if (isset($_COOKIE['login'])){
                $data['titulo_pagina'] = 'cInfo - Perfil';
                if ($user == ''){
                    $data['url'] = @$this->getDataUrl();
                    $user = $data['url'][0];
                }


                $data['user'] = $this->user->crud->getUser_byLogin($user);
                $data['foto'] = $data['user']->getFoto();
                $data['publicacoes'] = $this->postagem->crud->getPublicacoes_byUser($data['user']->getLogin());
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
            } else {
                header('Location: error_permissao');
            }

        }

        public function addFoto()
        {
            if (isset($_COOKIE['login'])){
                $target_dir = "assets/files/img/perfil/";
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

                        imagecopy($img,$org_img, 0, 0, $imsx, $imsy, $size, $size);
                        imagejpeg($img,$dest_image,90);
                        imagedestroy($img);

                        if (file_exists($target_dir . 'foto-' . $_COOKIE['login'] . '.' . $imageFileType)) {
                            unlink($target_dir . 'foto-' . $_COOKIE['login'] . '.' . $imageFileType);
                            rename($target_file, $target_dir . 'foto-' . $_COOKIE['login'] . '.' . $imageFileType);
                        } else {
                            rename($target_file, $target_dir . 'foto-' . $_COOKIE['login'] . '.' . $imageFileType);
                        }

                        $caminho_img = $target_dir . 'foto-' . $_COOKIE['login'] . '.' . $imageFileType;

                        $data['user'] = $this->user->crud->getUser_byLogin($_COOKIE['login']);
                        $data['user']->setFoto($caminho_img);
                        $this->user->crud->update($data['user']);

                        echo ' <div class="ui active dimmer"><div class="ui massive text loader">Loading</div></div>';

                        sleep(3);

                        header("Location: perfil/{$_COOKIE['login']}");
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            } else {
                header('Location: error_permissao');
            }

        }

        public function editar_perfil(){
            if (isset($_COOKIE['login'])){
                $user = $this->user->crud->getUser_byLogin($_COOKIE['login']);

                $user->setNome($_POST['nome']);
                $user->setEmail($_POST['email']);
                $user->setBio($_POST['bio']);

                if (isset($_POST['senha_nova'])){
                    if (crypt($_POST['password'], $user->getPassword()) == $user->getPassword()){
                        if ($_POST['senha_nova'] == $_POST['senha_confirmada']){
                            $user->setPassword(crypt($_POST['senha_nova']));
                        } else {
                            $this->perfil($_COOKIE['login']);
                        }
                    }
                }

                $this->user->crud->update($user);
            } else {
                header('Location: error_permissao');
            }
        }
    }