<?php

use Entity\EntityManager;

class EntityManagerTest extends PHPUnit_Framework_Test
{

    /**
     * @param $entity
     */
    public function testParseEntity($entity)
    {
        $testEntity = new EntityManager();
        $testEntity->insert($entity);
    }

}