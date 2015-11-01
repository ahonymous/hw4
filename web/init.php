<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 01/11/15
 * Time: 10:07
 */

ini_set('display_errors', 'on');
require '../config/autoload.php';
use Layer\Manager\Manager;
use \Entity\Group;
use \Entity\Pupil;
$manager = new Manager();
$manager->execute(Group::initScript());
$manager->execute(Pupil::initScript());
