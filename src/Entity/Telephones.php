<?php

namespace Entity;


class Telephones extends Devices
{
    private $modelDevice;
    private $brandDevice;
    private $numberPhone;
    private $typeTelephone;
    private $idTelephone;

    public function __construct()
    {
        $this->modelDevice = 'Some Model';
        $this->brandDevice = 'Some Brand';
        $this->numberPhone = '+123456789';
        $this->typeTelephone = 'Home Telephone';
        $this->idTelephone += 1;
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
    public function getIdTelephone()
    {
        return $this->idTelephone;
    }

    /**
     * @param $idTelephone
     */
    public function setIdTelephone($idTelephone)
    {
        $this->idTelephone = $idTelephone;
    }

    public function moveToMas($mas, $object){
        $mas += array(
            'id_dev'    => $object->idTelephone,
            'brand'     => $object->brandDevice,
            'model'     => $object->modelDevice,
            'num_phone' => $object->numberPhone,
            'type'      => $object->typeTelephone
            );
        return $mas;
    }
}