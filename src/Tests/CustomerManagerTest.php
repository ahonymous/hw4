<?php
/**
 * Created by PhpStorm.
 * User: fumus
 * Date: 05.11.15
 * Time: 14:53
 */

namespace Tests;

use Layer\Manager\CustomerManager;


class CustomerManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider instanceOfProvider
     * @param $expected
     */
    public function testInstanceOf($expected)
    {

        $pdoStub = $this->getMockBuilder('\PDO')->disableOriginalConstructor()->getMock();

        $this->assertInstanceOf($expected, new CustomerManager($pdoStub));

    }

    public function testFindAll()
    {
        $pdoStub = $this->getMockBuilder('\PDO')->disableOriginalConstructor()->getMock();
        $statementStub = $this->getMockBuilder('\PDOStatement')->disableOriginalConstructor()->getMock();
        $statementStub->method('bindValue')->willReturn($statementStub);
        $statementStub->method('execute')->willReturn($statementStub);
        $pdoStub->method('prepare')->willReturn($statementStub);
        $manager = new CustomerManager($pdoStub);
        $this->assertTrue(is_array($manager->findAll()));
    }

    public function instanceOfProvider()
    {

        return [

            ['Layer\Manager\AbstractManager'],
            ['Layer\Manager\ManagerInterface']
        ];
    }
}