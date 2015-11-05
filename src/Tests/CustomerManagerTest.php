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
    public function testInstanceOf($expected) {

        $pdoStub = $this->getMockBuilder('\PDO')->disableOriginalConstructor()->getMock();

        $this->assertInstanceOf($expected, new CustomerManager($pdoStub));

    }

    public function instanceOfProvider() {

        return [

            ['Layer\Manager\AbstractManager'],
            ['Layer\Manager\ManagerInterface']
        ];
    }
}