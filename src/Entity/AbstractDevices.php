<?php

namespace Entity;


abstract class AbstractDevices {

    abstract public function getModelDevice();
    abstract public function setModelDevice($nameDevice);
    abstract public function getBrandDevice();
    abstract public function setBrandDevice($brandDevice);
    abstract public function moveToMas($mas, $object);
}