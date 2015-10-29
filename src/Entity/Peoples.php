<?php

namespace Entity;


class Peoples
{
    private $firstName;
    private $secondName;
    private $idPeople;

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getSecondName()
    {
        return $this->secondName;
    }

    /**
     * @param $secondName
     */
    public function setSecondName($secondName)
    {
        $this->secondName = $secondName;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->idPeople;
    }

    /**
     * @param $idPeople
     */
    public function setId($idPeople)
    {
        $this->idPeople = $idPeople;
    }
}