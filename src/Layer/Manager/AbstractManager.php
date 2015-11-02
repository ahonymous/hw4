<?php

namespace Layer\Manager;

/**
 * Class AbstractManager
 * @package Layer\Manager
 */
abstract class AbstractManager implements ManagerInterface
{

    /**
     * @param mixed $entity
     * @return mixed
     */
    abstract function insert($entity);

    /**
     * @param $entity
     * @return mixed
     */
    abstract function update($entity);

    /**
     * @param $entity
     * @return mixed
     */
    abstract function remove($entity);

    /**
     * @param $entityName
     * @param $id
     * @return mixed
     */
    abstract function find($entityName, $id);

    /**
     * @param $entityName
     * @return mixed
     */
    abstract function findAll($entityName);

    /**
     * @param $entityName
     * @param array $criteria
     * @return mixed
     */
    abstract function findBy($entityName, $criteria = []);

}
