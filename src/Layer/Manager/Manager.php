<?php

namespace Layer\Manager;

/**
 * Class Manager
 * @package Layer\Manager
 */
abstract class Manager implements ManagerInterface
{
    /**
     * Insert new entity data to the DB
     * @param mixed $entity
     * @return mixed
     */
    public function insert($entity)
    {
        // TODO: Implement insert() method.
    }

    /**
     * Update exist entity data in the DB
     * @param $entity
     * @return mixed
     */
    public function update($entity)
    {
        // TODO: Implement update() method.
    }

    /**
     * Delete entity data from the DB
     * @param $entity
     * @return mixed
     */
    public function remove($entity)
    {
        // TODO: Implement remove() method.
    }

    /**
     * Search entity data in the DB by Id
     * @param $entityName
     * @param $id
     * @return mixed
     */
    public function find($entityName, $id)
    {
        // TODO: Implement find() method.
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

    /**
     * @param $entity
     * @param $scl
     * @return mixed
     */
    public function createTable($entity, $scl)
    {
        $entity->exec($scl);
    }

    /**
     * @param $entity
     * @param $scl
     * @return mixed
     */
    public function dropTable($entity, $scl)
    {
        // TODO: Implement dropTable() method.
    }


}