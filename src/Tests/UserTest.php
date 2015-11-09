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

    /**
     * @dataProvider userDate
     */
    public function testFind($userData){
        $mockUser = $this->getMockBuilder('Models\User')
                         ->disableOriginalConstructor()
                         ->getMock();


        $mockUser->method('find')
            ->will($this->returnValue($userData));

        $this->assertArrayHasKey('id', $mockUser->find('email','some@email.com'));
        $this->assertArrayHasKey('id', $mockUser->find('name','somename'));


    }

    /**
     * @dataProvider orderInfo
     */
    public function testAddOrderSutuffs($orderInfo){
        $mockOrder = $this->getMockBuilder('Models\Order')
                          ->disableOriginalConstructor()
                          ->getMock();

        $mockOrder->method('addOrderSutuffs')
            ->will($this->returnValue(true));

        $this->assertTrue($mockOrder->addOrderSutuffs($orderInfo[0],$orderInfo[1]));
    }

    



    public function orderInfo(){
        return array(
            [
                [1,2,3,4,5], 77,
            ],
            [
                [7,14,43,54], 54,
            ],
        );
    }




    public function userDate(){
        return array(
            [
               [
                   'id'=>'1',
                   'name'=>'somename_first',
                   'email'=>'some1@email.com',
               ],
            ],
            [
                [
                    'id'=>'2',
                    'name'=>'somename_second',
                    'email'=>'some2@email.com',
                ],
            ],
        );
    }


}
