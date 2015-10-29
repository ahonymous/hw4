<?php

namespace Entity;


class PhonesFromBlackList
{
    private $idPhone;
    private $idPeople;

    /**
     * @return mixed
     */
    public function getIdTelephone()
    {
        return $this->idPhone;
    }

    /**
     * @param $idPhone
     */
    public function setIdTelephone($idPhone)
    {
        $this->idPhone = $idPhone;
    }

    /**
     * @return mixed
     */
    public function getIdPeople()
    {
        return $this->idPeople;
    }

    /**
     * @param $idPeople
     */
    public function setIdPeople($idPeople)
    {
        $this->idPeople = $idPeople;
    }
}