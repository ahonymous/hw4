<?php
/**
 * Created by PhpStorm.
 * User: fumus
 * Date: 04.11.15
 * Time: 17:37
 */

namespace Tests;


class DataBaseConnectorTest extends \PHPUnit_Framework_TestCase
{
    public function testStaticAttribute()
    {
        $this->assertClassHasStaticAttribute('dsn', 'Layer\Connector\DataBaseConnector');
    }


}
