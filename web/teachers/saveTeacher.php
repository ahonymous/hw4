<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 30/10/15
 * Time: 21:59
 */


ini_set('display_errors', 'on');
require '../../config/autoload.php';
use \Entity\Teacher;
use Layer\Manager\TeacherManager;

$teacherManager = new TeacherManager();
if (isset($_POST['submit']))
{
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $surname = isset($_POST['surname']) ? $_POST['surname'] : 0;
    $teacher = new Teacher('teacher', $name, $surname);
    echo "<h1 style='color: green'>Teacher was successfully ";
    if (isset($_POST['id']))
    {
        $teacher->setId($_POST['id']);
        if (isset($_POST['delete']))
        {
            $teacherManager->remove($teacher);
            echo "removed";
        }
        else
        {
            foreach($_POST as $key => $value)
            {
                if (strpos($key,'group_') !== false)
                {
                    $teacher->addGroup($value);
                }
            }
            $teacherManager->update($teacher);
            echo "updated";
        }
    }
    else
    {
        foreach($_POST as $key => $value)
        {
            if (strpos($key,'group_') !== false)
            {
                $teacher->addGroup($value);
            }
        }
        $teacherManager->insert($teacher);
        echo "added";
    }
    echo "!</h1>";
}
echo "<p><a href='index.php'>Back</a></p>";
