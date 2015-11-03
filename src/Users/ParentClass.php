<?php

namespace Users;

class ParentClass extends AbstractUser
{
     protected $name;
     protected $surname;
     protected $sity;
    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @param mixed $sity
     */
    public function setSity($sity)
    {
        $this->sity = $sity;
    }

    /**
     * ParentClass constructor.
     * @param $name
     * @param $surname
     * @param $sity
     */
    public function __construct($name, $surname, $sity)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->sity = $sity;
    }

    /**
     * @return mixed
     */
    public function getSity()
    {
        return $this->sity;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }





}