<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 01/11/15
 * Time: 01:07
 */

namespace Entity;


class Pupil extends Entity
{
    private $id;
    private $name;
    private $age;
    private $group_id;

    use EntityTrait;

    public function __construct($entityName, $name, $age) {
        parent::__construct($entityName);
        $this->name = $name;
        $this->age = $age;
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

    /**
     * @return mixed
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * @param mixed $group_id
     */
    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;
    }

    /**
     * @return string
     */
    public static function initScript()
    {

        return "CREATE TABLE `pupil` (".
            "`id` int(11) NOT NULL AUTO_INCREMENT,".
            "`name` varchar(15) NOT NULL,".
            "`age` int(11) NOT NULL,".
            "`group_id` int(11) NOT NULL,".
            "PRIMARY KEY (`id`),".
            "KEY `pupil_group_FK` (`group_id`),".
            "CONSTRAINT `pupil_group_FK` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`)".
        ") ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1";
    }
}