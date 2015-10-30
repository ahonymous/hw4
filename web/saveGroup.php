<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 30/10/15
 * Time: 21:59
 */


ini_set('display_errors', 'on');
require '../config/autoload.php';
use Entity\Group;
use Layer\Manager\GroupManager;

$groupManager = new GroupManager();
if (isset($_POST["submit"])) {
    $group = new Group($_POST["name"], $_POST["size"]);
    $groupManager->insert($group);
}
echo "<h1 style='color: green'>Group was successfully added!</h1>";