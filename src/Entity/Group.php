<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 30/10/15
 * Time: 00:19
 */

namespace Entity;


class Group extends Entity
{
    private $id;
    private $name;
    private $size;

    use EntityTrait;

    public function __construct($entityName, $name, $size) {
        parent::__construct($entityName);
        $this->name = $name;
        $this->size = $size;
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
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
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
     * @return string
     */
    public static function initScript()
    {
        return "CREATE TABLE `group` (".
            "`id` int(11) NOT NULL AUTO_INCREMENT,".
            "`size` int(11) NOT NULL,".
            "`name` varchar(15) NOT NULL,".
            "PRIMARY KEY (`id`),".
            "UNIQUE KEY `unique_id` (`id`)".
        ") ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1";
    }
}