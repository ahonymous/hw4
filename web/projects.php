<?php

require __DIR__.'/../config/autoload.php';

$connector = new \Layer\Connector\Connector($config['db_name'], $config['db_user'], $config['db_password']);

$project = new \Layer\Manager\ProjectManager($connector);

if (isset($_POST['ins_project_name'])
    && isset($_POST['ins_execution_time'])
    && isset($_POST['ins_field'])
) {
    $project->insert(array(
        'project_name' => htmlspecialchars($_POST['ins_project_name']),
        'execution_time' => htmlspecialchars($_POST['ins_execution_time']),
        'field' => htmlspecialchars($_POST['ins_field']),
    ));

    foreach ($_POST as $post) {
        unset($post);
    }
    $res_insert = 'Вставка в таблицу проeктов успешна';
} else {
    $res_insert = '';
}

if (isset($_POST['upd_project_name'])
    && isset($_POST['upd_execution_time'])
    && isset($_POST['upd_field'])
    && isset($_POST['upd_record_id'])
) {
    $project->update($_POST['upd_record_id'], array(
        'project_name' => htmlspecialchars($_POST['upd_project_name']),
        'execution_time' => htmlspecialchars($_POST['upd_execution_time']),
        'field' => htmlspecialchars($_POST['upd_field']),
    ));

    foreach ($_POST as $post) {
        unset($post);
    }
    $res_update = 'Обновление в таблице проeктов успешно';
} else {
    $res_update = '';
}

if (isset($_POST['rem_record_id'])) {
    $project->remove($_POST['rem_record_id']);

    foreach ($_POST as $post) {
        unset($post);
    }
    $res_remove = 'Удаление в таблице проeктов успешно';
} else {
    $res_remove = '';
}

if (isset($_POST['find_record_id'])) {
    $tmpRes = $project->find($_POST['find_record_id']);

    foreach ($_POST as $post) {
        unset($post);
    }
    $res_find = '';
    foreach ($tmpRes as $record) {
        $res_find .= $record.'<br>';
    }
} else {
    $res_find = '';
}

if (isset($_POST['find_record_yes'])) {
    $tmpRes = $project->findAll();

    foreach ($_POST as $post) {
        unset($post);
    }
    $res_find_all = '';
    foreach ($tmpRes as $record) {
        $res_find_all .= $record.'<br>';
    }
} else {
    $res_find_all = '';
}


$connector->connectClose($config['db_name']);

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>
        Index
    </title>
</head>
<body>
<a href="index.php">Researchers</a><br>
<a href="projects.php">Projects</a><br>
<a href="nationalities.php">Nationalities</a><br>
<a href="grants.php">Grants</a><br>
<br><br>

<form action="projects.php" method="post">
    <p>Вставить информацию в таблицу проeктов ("projects").</p>

    <p>Название: <input type="text" name="ins_project_name"/></p>

    <p>Время: <input type="text" name="ins_execution_time"/></p>

    <p>Область: <input type="text" name="ins_field"/></p>
    <button type="submit">
        Insert
    </button>
    <p><?php echo $res_insert ?></p>
</form>
<hr>
<form action="projects.php" method="post">
    <p>Обновить информацию в таблице проeктов ("projects").</p>

    <p>ФИО: <input type="text" name="upd_project_name"/></p>

    <p>Опыт работы: <input type="text" name="upd_execution_time"/></p>

    <p>Степень: <input type="text" name="upd_field"/></p>

    <p>Id обновляемой записи: <input type="text" name="upd_record_id"/></p>
    <button type="submit">
        Update
    </button>
    <p><?php echo $res_update ?></p>
</form>
<hr>
<form action="projects.php" method="post">
    <p>Удалить запись в таблице проeктов ("projects").</p>

    <p>Id удаляемой записи: <input type="text" name="rem_record_id"/></p>
    <button type="submit">
        Remove
    </button>
    <p><?php echo $res_remove ?></p>
</form>
<hr>
<form action="projects.php" method="post">
    <p>Найти запись в таблице проeктов ("projects").</p>

    <p>Id искомой записи: <input type="text" name="find_record_id"/></p>
    <button type="submit">
        Find
    </button>
    <p><?php echo $res_find ?></p>
</form>
<hr>
<form action="projects.php" method="post">
    <p>Найти все записи в таблице проeктов ("projects").</p>

    <p>Все записи? <input type="text" name="find_record_yes"/></p>
    <button type="submit">
        FindAll
    </button>
    <p><?php echo $res_find_all ?></p>
</form>

</body>
</html>
