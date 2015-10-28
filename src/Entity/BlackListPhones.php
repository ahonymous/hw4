<?php

namespace Entity;


class BlackListPhones
{
    private $idPhone;
    private $idPeople;

    /**
     * @return mixed
     */
    protected function getIdTelephone()
    {
        return $this->idPhone;
    }

    /**
     * @param $idPhone
     */
    protected function setIdTelephone($idPhone)
    {
        $this->idPhone = $idPhone;
    }

    /**
     * @return mixed
     */
    protected function getIdPeople()
    {
        return $this->idPeople;
    }

    /**
     * @param $idPeople
     */
    protected function setIdPeople($idPeople)
    {
        $this->idPhone = $idPeople;
    }
}