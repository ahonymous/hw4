<?php
/**
 * Created by PhpStorm.
 * User: fumus
 * Date: 04.11.15
 * Time: 19:55
 */

namespace Tests;

use Entity\Customer;

class CustomerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider attributesProvider
     * @param $attr
     */
    public function testAttributes($attr)
    {
        $obj = new Customer('John','Doe','username@something.com');
        $this->assertObjectHasAttribute($attr, $obj);
    }

    /**
     * @param $expected
     * @dataProvider methodProvider
     */
    public function testMethodExists($expected)
    {
        $obj = new Customer('John','Doe','username@something.com');
        $this->assertTrue(method_exists($obj, $expected));
    }

    public function methodProvider()
    {
        return [
            ['setFirstName'],
            ['getFirstName'],
            ['setLastName'],
            ['getLastName'],
            ['setEmail'],
            ['getEmail'],
            ['setCreatedAt'],
            ['getCreatedAt'],
            ['setUpdatedAt'],
            ['getUpdatedAt']

        ];
    }

    public function attributesProvider() {

        return [
            ['firstName'],
            ['lastName'],
            ['email'],
            ['createdAt'],
            ['updatedAt']
        ];
    }
}
