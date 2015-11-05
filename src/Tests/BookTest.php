<?php
/**
 * Created by PhpStorm.
 * User: fumus
 * Date: 04.11.15
 * Time: 18:56
 */

namespace Tests;

use Entity\Book;


class BookTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider attributesProvider
     * @param $attr
     * @param $obj
     */

    public function testAttributes($attr)
    {
        $obj = new Book();
        $this->assertObjectHasAttribute($attr, $obj);
    }

    /**
     * @dataProvider instanceOfProvider
     * @param $expected
     * @param $obj
     */
    public function testInstanceOf($expected)
    {
        $obj = new Book();
        $this->assertInstanceOf($expected, $obj);
    }



    public function attributesProvider() {

        return [
            ['isbn'],
            ['author'],
            ['publishingHouse'],
            ['createdAt'],
            ['updatedAt'],
            ['title'],
            ['price']
        ];
    }

    public function instanceOfProvider() {

        return [

            ['Entity\AbstractProduct'],
            ['Entity\Book']
        ];
    }
}