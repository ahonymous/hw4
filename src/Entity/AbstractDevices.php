<?php

namespace Entity;


abstract class AbstractDevices {

    abstract public function getModel();
    abstract public function setModel($nameDevice);
    abstract public function getBrand();
    abstract public function setBrand($brandDevice);
    abstract public function getId();
    abstract public function setId($id);
}