<?php

namespace Entity;


class MobileTelephone extends Telephones
{
    private $imeiPhone;
    protected $typeTelephone;

    public function __construct()
    {
        $this->typeTelephone = 'Mobile Telephone';
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

    public function getType(){
        return $this->typeTelephone;
    }
}