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

    /**
     * @test
     */
    public function AttributesTable(){
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
     * @dataProvider OrderData
     */
    public function testRegisterOrder($OrderData){
        $mockOrder = $this->getMockBuilder('Models\Order')
            ->disableOriginalConstructor()
            ->getMock();

        $mockOrder->method('registerOrder')
            ->will($this->returnValue(true));
        $order_id = $mockOrder->registerOrder($OrderData);

        return $order_id;
    }


    /**
     * @depends testRegisterOrder
     * @dataProvider orderInfo
     */
    public function testAddOrderSutuffs($orderInfo,$order_id){
        $mockOrder = $this->getMockBuilder('Models\Order')
                          ->disableOriginalConstructor()
                          ->getMock();

        $mockOrder->method('addOrderSutuffs')
            ->will($this->returnValue(true));

        $this->assertTrue($mockOrder->addOrderSutuffs($orderInfo,$order_id));

    }


    public function orderInfo(){
        return array(
            [
                [1,2,3,4,5],
            ],
            [
                [23,24,12,43,65],
            ],
            [
                [12,43,65,98],
            ],
        );
    }

    public function OrderData(){
        return array(
            [
                [1,1,],
            ],
            [
                [1,2,],
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
