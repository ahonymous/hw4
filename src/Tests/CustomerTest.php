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
     */
    public function testAttributes($attr, $obj)
    {

        $this->assertObjectHasAttribute($attr, $obj);
    }

    public function attributesProvider() {

        return [
            ['firstName', new Customer('John','Doe','username@something.com')],
            ['lastName', new Customer('John','Doe','username@something.com')],
            ['email', new Customer('John','Doe','username@something.com')],
            ['createdAt', new Customer('John','Doe','username@something.com')],
            ['updatedAt', new Customer('John','Doe','username@something.com')]
        ];
    }
}