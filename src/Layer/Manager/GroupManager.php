<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 30/10/15
 * Time: 00:23
 */

namespace Layer\Manager;


class GroupManager extends AbstractManager
{

    private $connection;

    public function __construct() {
        parent::__construct();
        $this->connection = parent::getConnection();
    }
    /**
     * Insert new entity data to the DB
     * @param mixed $group
     * @return mixed
     */
    public function insert($group)
    {
        $this->connection->query(
            "INSERT INTO `group` (name, size) ".
            "VALUES ('".$group->getName()."', ".$group->getSize().")"
        );
        $group->setId($this->connection->lastInsertId());
    }

    /**
     * Update exist entity data in the DB
     * @param $entity
     * @return mixed
     */
    public function update($entity)
    {
        $this->connection->query(
            "UPDATE `group` SET ".
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
            "DELETE FROM `group` WHERE `id`=".$entity->getId()
        );
    }

    /**
     * Search entity data in the DB by Id
     * @param $entityName
     * @param $id
     * @return mixed
     */
    public function find($entityName, $id)
    {
        $result = $this->connection->query(
            "SELECT * FROM `group` WHERE `id`=".$id." LIMIT 1"
        );
        foreach($result as $row) {
            echo $row[0];
        }
//        $group = new Group($groupResult['name'], $groupResult['size']);
//        $group->setId($groupResult['id']);
//        return $group;
    }

    /**
     * Search all entity data in the DB
     * @param $entityName
     * @return array
     */
    public function findAll($entityName)
    {
        // TODO: Implement findAll() method.
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