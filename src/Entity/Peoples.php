<?php

namespace Entity;


class Peoples
{
    private $firstNamePeople;
    private $secondNamePeople;
    private $idPeople;

    /**
     * @return mixed
     */
    protected function getFirstNamePeople()
    {
        return $this->firstNamePeople;
    }

    /**
     * @param $firstNamePeople
     */
    protected function setFirstNamePeople($firstNamePeople)
    {
        $this->firstNamePeople = $firstNamePeople;
    }

    /**
     * @return mixed
     */
    protected function getSecondNamePeople()
    {
        return $this->secondNamePeople;
    }

    /**
     * @param $secondNamePeople
     */
    protected function setSecondNamePeople($secondNamePeople)
    {
        $this->secondNamePeople = $secondNamePeople;
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
        $this->idPeople = $idPeople;
    }
}