<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 30/10/15
 * Time: 21:59
 */


ini_set('display_errors', 'on');
require '../../config/autoload.php';
use Entity\Group;
use Layer\Manager\Manager;

$groupManager = new Manager();
if (isset($_POST['submit']))
{
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $size = isset($_POST['size']) ? $_POST['size'] : 0;
    $group = new Group('group', $name, $size);
    echo "<h1 style='color: green'>Group was successfully ";
    if ($_POST['id'])
    {
        $group->setId($_POST['id']);
        if (isset($_POST['delete']))
        {
            $groupManager->remove($group);
            echo "removed";
        }
        else
        {
            $groupManager->update($group);
            echo "updated";
        }
    }
    else
    {
        $groupManager->insert($group);
        echo "added";
    }
    echo "!</h1>";
}
echo "<p><a href='./index.php'>Back</a></p>";
