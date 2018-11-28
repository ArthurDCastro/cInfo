<?php
/**
 * Created by PhpStorm.
 * User: Arthur Castro
 * Date: 03/08/2018
 * Time: 22:21
 */

class Postagem
{

    private $user;
    private $grafico;
    private $descricao;
    private $comentarios;
    private $like;
    private $data;
    private $codigo;

    /**
     * Postagem constructor.
     * @param $user
     * @param $grafico
     * @param $descricao
     * @param $comentarios
     * @param $like
     * @param $data
     */
    public function __construct($user, $grafico, $descricao, $comentarios, array $like, string $data, $codigo)
    {
        $this->user = $user;
        $this->grafico = $grafico;
        $this->descricao = $descricao;
        $this->comentarios = $comentarios;
        $this->like = $like;
        $this->data = $data;
        $this->codigo = $codigo;
    }

    public function insert(){
        $comentarios = [];
        foreach ($this->comentarios as $coment){
            $comentarios[] = [
                'text' => $coment->getComentario(),
                'codigo' => $coment->getCodigo(),
                'user' => $coment->getUser()->getLogin(),
                'data' => $coment->getData()
            ];
        }

        return [
            'codigo'       => $this->codigo,
            'user'      => $this->user->getLogin(),
            'grafico'     => $this->grafico->getCodigo(),
            'descricao' => $this->descricao,
            'comentarios'  => $comentarios,
            'like'     => $this->like,
            'data'      => $this->data
        ];
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo): void
    {
        $this->codigo = $codigo;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return Grafico
     */
    public function getGrafico(): Grafico
    {
        return $this->grafico;
    }

    /**
     * @param Grafico $grafico
     */
    public function setGrafico(Grafico $grafico): void
    {
        $this->grafico = $grafico;
    }

    /**
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     */
    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }

    /**
     * @param mixed $comentarios
     */
    public function setComentarios($comentarios): void
    {
        $this->comentarios = $comentarios;
    }

    public function setComentario($comentario): void
    {
        $this->comentarios[] = $comentario;
    }

    public function removeLike($user){
        $new_likes = [];
        foreach ($this->like as $like){
            if ($user != $like){
                $new_likes[] = $like;
            }
        }

        $this->like = $new_likes;
    }

    public function addLike($user){
        $this->like[] = $user;
    }

    /**
     * @return array
     */
    public function getLike(): array
    {
        return $this->like;
    }

    /**
     * @param array $like
     */
    public function setLike(array $like): void
    {
        $this->like = $like;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @param string $data
     */
    public function setData(string $data): void
    {
        $this->data = $data;
    }


}