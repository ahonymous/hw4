<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 31/10/15
 * Time: 13:46
 */

ini_set('display_errors', 'on');
require '../../config/autoload.php';
use Layer\Manager\TeacherManager;
$teachersManager = new TeacherManager();
foreach($teachersManager->findAll('teacher') as $row) {
    echo "<p>";
    foreach($row as $key => $value) {
        if (!is_int($key)) echo "<b>".$key."</b>: ".$value." ";
    }
    echo "</p>";
}