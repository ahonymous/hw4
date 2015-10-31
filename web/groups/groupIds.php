<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 31/10/15
 * Time: 23:54
 */

ini_set('display_errors', 'on');
require '../../config/autoload.php';
use Layer\Manager\Manager;
$groupManager = new Manager();
foreach($groupManager->findAll('group') as $row) {
    echo "<option>".$row['id']."</option>";
}