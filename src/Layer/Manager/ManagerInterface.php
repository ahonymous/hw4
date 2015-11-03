<?php

namespace Layer\Manager;

/**
 * Interface ManagerInterface
 * @package Layer\Manager
 */
interface ManagerInterface
{
    /**
     * @param array $entity
     * @return mixed
     */
    public function insert(array $entity);

    /**
     * @param $entity
     * @param array $params
     * @return mixed
     */
    public function update($entity, array $params);

    /**
     * Delete entity data from the DB
     * @param $entity
     * @return mixed
     */
    public function remove($entity);

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);
}