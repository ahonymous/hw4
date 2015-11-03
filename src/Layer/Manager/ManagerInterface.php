<?php

namespace Layer\Manager;

/**
 * Interface ManagerInterface
 * @package Layer\Manager
 */
interface ManagerInterface
{

    /**
     * Update exist entity data in the DB
     * @param $entity
     * @return mixed
     */
    public function update($name, $surname, $id);

    /**
     * Delete entity data from the DB
     * @param $entity
     * @return mixed
     */
    public function remove($tableName, $id);

    /**
     * Search entity data in the DB by Id
     * @param $entityName
     * @param $id
     * @return mixed
     */
    public function find($entityName, $id);

    /**
     * Search all entity data in the DB
     * @param $entityName
     * @return array
     */
    public function findAll($entityName);

    /**
     * Search all entity data in the DB like $criteria rules
     * @param $entityName
     * @param array $criteria
     * @return mixed
     */
    public function findBy($entityName, $criteria = []);
}