<?php
/**
 * Created by PhpStorm.
 * User: hibro
 * Date: 06.11.15
 * Time: 21:27
 */

namespace Tests;

class ConnectTest extends \PHPUnit_Framework_TestCase
{

    public function testConfigExists(){
        $this->assertFileExists('./config/config.php');
    }

    public function MockingPDO(){;
        $MockPDO = $this->getMockBuilder('PDO')
                        ->disableOriginalConstructor()
                        ->getMock();

        return $MockPDO;
    }


    public function testAttributesTable(){
        $this->assertClassHasAttribute('table','Models\User');
        $this->assertClassHasAttribute('table','Models\Customer');
        $this->assertClassHasAttribute('table','Models\Stuff');

    }

    public function testFind(){
        $mockUser = $this->getMockBuilder('Models\User')
                         ->disableOriginalConstructor()
                         ->getMock();

        $result = array('id'=>'1',
                        'name'=>'somename',
                        'email'=>'some@email.com');

        $mockUser->method('find')
            ->will($this->returnValue($result));

        $this->assertArrayHasKey('id', $mockUser->find('email','some@email.com'));
        $this->assertArrayHasKey('id', $mockUser->find('name','somename'));
        $this->assertArrayHasKey('id', $mockUser->find('id','1'));

    }
}
