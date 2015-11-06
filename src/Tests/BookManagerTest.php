<?php
/**
 * Created by PhpStorm.
 * User: fumus
 * Date: 05.11.15
 * Time: 0:46
 */

namespace Tests;

use Layer\Manager\BookManager;


class BookManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider instanceOfProvider
     * @param $expected
     */
    public function testInstanceOf($expected)
    {

        $pdoStub = $this->getMockBuilder('\PDO')->disableOriginalConstructor()->getMock();

        $this->assertInstanceOf($expected, new BookManager($pdoStub));

    }

    public function instanceOfProvider()
    {

        return [

            ['Layer\Manager\AbstractManager'],
            ['Layer\Manager\ManagerInterface']
        ];
    }
}