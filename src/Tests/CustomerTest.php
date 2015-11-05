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