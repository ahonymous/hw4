<?php
/**
 * Created by PhpStorm.
 * User: hibro
 * Date: 06.11.15
 * Time: 21:27
 */

namespace Tests;

use Models;


class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testLetsStart(){
        $stack = array();
        $this->assertEquals(1, count($stack));

        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertEquals(1, count($stack));

        $this->assertEquals('foo', array_pop($stack));
        $this->assertEquals(0, count($stack));
    }

}
