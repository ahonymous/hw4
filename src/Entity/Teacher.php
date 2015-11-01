<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 01/11/15
 * Time: 10:59
 */

namespace Entity;


class Teacher extends Entity
{
    private $id;
    private $name;
    private $surname;

    use EntityTrait;

    public function __construct($entityName, $name, $surname) {
        parent::__construct($entityName);
        $this->name = $name;
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public static function initScript()
    {
        // TODO: Implement initScript() method.
    }
}