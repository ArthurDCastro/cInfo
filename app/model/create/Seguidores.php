<?php

class Seguidores
{
    private $seguidor;
    private $seguindo;
    private $dti;
    private $dtf;
    private $id;

    public function __construct(User $seguidor, User $seguindo, $dti = '', $dtf = '', $id = '')
    {
        $this->seguidor = $seguidor;
        $this->seguindo = $seguindo;
        $this->dti = $dti;
        $this->dtf = $dtf;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }



    public function insert(){
        return [
            'seguidor' => $this->seguidor->getLogin(),
            'seguindo' => $this->seguindo->getLogin(),
            'dti'   => $this->dti,
            'dtf'   => $this->dtf,
            'id'    => $this->id
        ];
    }

    /**
     * @return string
     */
    public function getSeguidor()
    {
        return $this->seguidor;
    }

    /**
     * @param string $seguidor
     */
    public function setSeguidor( $seguidor)
    {
        $this->seguidor = $seguidor;
    }

    /**
     * @return string
     */
    public function getSeguindo()
    {
        return $this->seguindo;
    }

    /**
     * @param string $seguindo
     */
    public function setSeguindo( $seguindo)
    {
        $this->seguindo = $seguindo;
    }

    /**
     * @return string
     */
    public function getDti(): string
    {
        return $this->dti;
    }

    /**
     * @param string $dti
     */
    public function setDti(string $dti): void
    {
        $this->dti = $dti;
    }

    /**
     * @return string
     */
    public function getDtf(): string
    {
        return $this->dtf;
    }

    /**
     * @param string $dtf
     */
    public function setDtf(string $dtf): void
    {
        $this->dtf = $dtf;
    }



}