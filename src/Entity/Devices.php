<?php

namespace Entity;


class Devices extends AbstractDevices{

    private $modelDevice;
    private $brandDevice;
    private $id;
    private $typeDev;

    /**
     * @return mixed
     */
    public function getModel(){
        return $this->modelDevice;
    }

    /**
     * @param $modelDevice
     */
    public function setModel($modelDevice)
    {
        $this->modelDevice = $modelDevice;
    }

    /**
     * @return mixed
     */
    public function getBrand(){
        return $this->brandDevice;
    }

    /**
     * @param $brandDevice
     */
    public function setBrand($brandDevice)
    {
        $this->brandDevice = $brandDevice;
    }

    public function getId(){
        return $this->brandDevice;
    }

    public function setID($id)
    {
        $this->id = $id;
    }
    public function getType(){
        return $this->typeDev;
    }

}