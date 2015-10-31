<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 30/10/15
 * Time: 21:59
 */


ini_set('display_errors', 'on');
require '../../config/autoload.php';
use \Entity\Pupil;
use Layer\Manager\Manager;

$pupilManager = new Manager();
if (isset($_POST['submit']))
{
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $age = isset($_POST['age']) ? $_POST['age'] : 0;
    $pupil = new Pupil('pupil', $name, $age);
    echo "<h1 style='color: green'>Pupil was successfully ";
    if (isset($_POST['id']))
    {
        $pupil->setId($_POST['id']);
        if (isset($_POST['delete']))
        {
            $pupilManager->remove($pupil);
            echo "removed";
        }
        else
        {
            $pupil->setGroupId($_POST['group_id']);
            $pupilManager->update($pupil);
            echo "updated";
        }
    }
    else
    {
        $pupil->setGroupId($_POST['group_id']);
        $pupilManager->insert($pupil);
        echo "added";
    }
    echo "!</h1>";
}
echo "<p><a href='index.php'>Back</a></p>";
