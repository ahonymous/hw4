<?php

namespace Tests;

use Entity\EntityManager;
use User\User;
use Composer\Autoload;


class EntityManagerTest extends \PHPUnit_Framework_TestCase
{

    public function testParseEntity()
    {
        $user = new User();
        $user->setCreatedAt('1111');
        $user->setUserName('Roma');

        $testEntity = new EntityManager();
        $parsedEntity = $testEntity->entityParse($user);

        $this->assertArraySubset( ['entity' => 'User',
            'properties' => [
                'id' => null,
                'userName' => 'Roma',
                'createdAt' => '1111',
                'updatedAt' => null,
                'deletedAt' => null
            ]] , $parsedEntity);
    }

}