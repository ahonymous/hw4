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

    public function testAttributes($attr, $obj)
    {

        $this->assertObjectHasAttribute($attr, $obj);
    }

    /**
     * @dataProvider instanceOfProvider
     * @param $expected
     * @param $obj
     */
    public function testInstanceOf($expected, $obj)
    {
        $this->assertInstanceOf($expected, $obj);
    }



    public function attributesProvider() {

        return [
            ['isbn', new Book()],
            ['author', new Book()],
            ['publishingHouse', new Book()],
            ['createdAt', new Book()],
            ['updatedAt', new Book()],
            ['title', new Book()],
            ['price', new Book()]
        ];
    }

    public function instanceOfProvider() {

        return [

            ['Entity\AbstractProduct', new Book()],
            ['Entity\Book', new Book()]
        ];
    }
}