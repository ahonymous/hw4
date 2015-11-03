<?php

namespace Users;

class ChildrenClass extends ParentClass
{
     protected $name;
     protected $surname;
     protected $sity;
     protected $age;

    /**
     * ChildrenClass constructor.
     * @param $age
     * @param $name
     * @param $surname
     * @param $sity
     */
    public function __construct($name, $surname, $sity, $age)
    {
        $this->age = $age;
        $this->name = $name;
        $this->surname = $surname;
        $this->sity = $sity;
    }


    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }


}