<?php

class Seguidores
{
    private $seguidor;
    private $seguindo;
    private $dti;
    private $dtf;

    public function __construct(User $seguidor, User $seguindo, $dti = '', $dtf = '')
    {
        $this->seguidor = $seguidor;
        $this->seguindo = $seguindo;
        $this->dti = $dti;
        $this->dtf = $dtf;
    }

    public function insert(){
        return [
            '_id'   => new MongoDB\BSON\ObjectId,
            'seguidor' => $this->seguidor,
            'seguindo' => $this->seguindo,
            'dti'   => $this->dti,
            'dtf'   => $this->dtf,
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