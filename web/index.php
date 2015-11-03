<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require __DIR__ . '/../config/autoload.php';

use Layer\Connector\ConectBd;
use Users\ParentClass;
use Users\ChildrenClass;


$bd = new ConectBd();
$data = $bd->connect($config['host'], $config['db_user'], $config['db_password'], $config['database']);

$tableParent = $bd->createTableParent();
$tableClildren = $bd->createTableChildren();

if(isset($_GET['name']) && isset($_GET['surname']) && isset($_GET['sity']))
{
    $parentData = new ParentClass($_GET['name'], $_GET['surname'], $_GET['sity']);
    $insertToBd = $bd->insertParent($parentData);
}
if(isset($_GET['name2']) && isset($_GET['surname2']) && isset($_GET['sity2']) && isset($_GET['age']))
{
    $chilrenData = new ChildrenClass($_GET['name2'], $_GET['surname2'], $_GET['sity2'], $_GET['age']);
    $insertToBd = $bd->insertChildren($chilrenData);
}
echo 'findAll <br>';
$rez = $bd->findAll('parent');
print_r($rez);
echo 'LeftJoin <br><br>';
$rez = $bd->LeftJoin();
print_r($rez);

$bd->connectClose($bd);

