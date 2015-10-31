<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 30/10/15
 * Time: 00:23
 */

namespace Layer\Manager;


class Manager extends AbstractManager
{

    private $connection;

    public function __construct() {
        parent::__construct();
        $this->connection = parent::getConnection();
    }
    /**
     * Insert new entity data to the DB
     * @param mixed $entity
     * @return mixed
     */
    public function insert($entity)
    {
        $this->connection->query(
            "INSERT INTO `".$entity->getEntityName()."` ".
            "(".implode(', ', $entity->getKeys()).") ".
            "VALUES (".implode(', ', $entity->getValues()).")"
        );
        $entity->setId($this->connection->lastInsertId());
    }

    /**
     * Update exist entity data in the DB
     * @param $entity
     * @return mixed
     */
    public function update($entity)
    {
        $this->connection->query(
            "UPDATE `".$entity->getEntityName()."` SET ".
            "`name`='".$entity->getName()."', `size`=".$entity->getSize().
            " WHERE `id`=".$entity->getId()
        );
    }

    /**
     * Delete entity data from the DB
     * @param $entity
     * @return mixed
     */
    public function remove($entity)
    {
        $this->connection->query(
            "DELETE FROM `".$entity->getEntityName()."` WHERE `id`=".$entity->getId()
        );
    }

    /**
     * Search entity data in the DB by Id
     * @param $id
     * @param $entityName
     * @return mixed
     */
    public function find($entityName, $id)
    {
        $result = $this->connection->query(
            "SELECT * FROM `".$entityName."` WHERE `id`=".$id." LIMIT 1"
        );
        foreach($result as $row) {
            foreach($row as $key => $value) {
                if (!is_int($key)) echo "<b>".$key."</b>: ".$value.", ";
            }
        }
    }

    /**
     * Search all entity data in the DB
     * @param $entityName
     * @return array
     */
    public function findAll($entityName)
    {
        $result = $this->connection->query(
            "SELECT * FROM `".$entityName
        );
        foreach($result as $row) {
            echo "<p>";
            foreach($row as $key => $value) {
                if (!is_int($key)) echo "<b>".$key."</b>: ".$value." ";
            }
            echo "</p>";
        }
    }

    /**
     * Search all entity data in the DB like $criteria rules
     * @param $entityName
     * @param array $criteria
     * @return mixed
     */
    public function findBy($entityName, $criteria = [])
    {
        // TODO: Implement findBy() method.
    }
}