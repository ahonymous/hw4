<?php
/**
 * Created by PhpStorm.
 * User: fumus
 * Date: 04.11.15
 * Time: 18:07
 */

namespace Tests;


class ConfigTest extends \PHPUnit_Framework_TestCase
{
    public function testConfigFileExists()
    {
        $this->assertFileExists('config/config.php');
    }
}