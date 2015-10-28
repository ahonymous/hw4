<?php

namespace Entity;


class MobileTelephone extends Telephones
{
    private $nameDevice;
    private $brandDevice;
    private $numberPhone;
    private $imeiPhone;
    private $idTelephone;
    private $typeTelephone;

    public function __construct()
    {
        $this->nameDevice = 'Some Telephone';
        $this->brandDevice = 'Some Brand';
        $this->numberPhone = '+123456789';
        $this->typeTelephone = 'mobile';
        $this->idTelephone += 1;
    }

    /**
     * @return mixed
     */
    public function getImei()
    {
        return $this->imeiPhone;
    }

    /**
     * @param $imeiPhone
     */
    public function setImei($imeiPhone)
    {
        $this->imeiPhone = $imeiPhone;
    }
}