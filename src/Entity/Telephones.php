<?php

namespace Entity;


class Telephones extends Devices
{
    private $numberPhone;
    protected $typeTelephone;
    private $idTelephone;

    public function __construct()
    {
        $this->typeTelephone = 'Home Telephone';
    }
    /**
     * @return mixed
     */
    public function getNumberPhone()
    {
        return $this->numberPhone;
    }

    /**
     * @param $numberPhone
     */
    public function setNumberPhone($numberPhone)
    {
        $this->numberPhone = $numberPhone;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->idTelephone;
    }

    /**
     * @param $idTelephone
     */
    public function setId($idTelephone)
    {
        $this->idTelephone = $idTelephone;
    }
}