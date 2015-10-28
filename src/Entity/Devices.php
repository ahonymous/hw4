<?php

namespace Entity;


class Devices extends AbstractDevices{

    private $nameDevice;
    private $brandDevice;

    /**
     * @return mixed
     */
    public function getModelDevice(){
        return $this->nameDevice;
    }

    /**
     * @param $nameDevice
     */
    public function setModelDevice($nameDevice)
    {
        $this->nameDevice = $nameDevice;
    }

    /**
     * @return mixed
     */
    public function getBrandDevice(){
        return $this->brandDevice;
    }

    /**
     * @param $brandDevice
     */
    public function setBrandDevice($brandDevice)
    {
        $this->brandDevice = $brandDevice;
    }

    public function moveToMas($mas, $object){}
}