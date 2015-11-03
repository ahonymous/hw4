<?php

require __DIR__.'/../config/autoload.php';

$connector = new \Layer\Connector\Connector($config['db_name'], $config['db_user'], $config['db_password']);

$nationality = new \Layer\Manager\NationalityManager($connector);

if (isset($_POST['ins_nationality'])) {
    $nationality->insert(array(
        'nationality' => htmlspecialchars($_POST['ins_nationality']),
    ));

    foreach ($_POST as $post) {
        unset($post);
    }
    $res_insert = 'Вставка в таблицу национальностей успешна';
} else {
    $res_insert = '';
}

if (isset($_POST['upd_nationality'])
    && isset($_POST['upd_record_id'])
) {
    $nationality->update($_POST['upd_record_id'], array(
        'nationality' => htmlspecialchars($_POST['upd_nationality']),
    ));

    foreach ($_POST as $post) {
        unset($post);
    }
    $res_update = 'Обновление в таблице национальностей успешно';
} else {
    $res_update = '';
}

if (isset($_POST['rem_record_id'])) {
    $nationality->remove($_POST['rem_record_id']);

    foreach ($_POST as $post) {
        unset($post);
    }
    $res_remove = 'Удаление в таблице национальностей успешно';
} else {
    $res_remove = '';
}

if (isset($_POST['find_record_id'])) {
    $tmpRes = $nationality->find($_POST['find_record_id']);

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
    $tmpRes = $nationality->findAll();

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

<form action="nationalities.php" method="post">
    <p>Вставить информацию в таблицу национальностей ("nationalities").</p>

    <p>Национальность: <input type="text" name="ins_nationality"/></p>
    <button type="submit">
        Insert
    </button>
    <p><?php echo $res_insert ?></p>
</form>
<hr>
<form action="nationalities.php" method="post">
    <p>Обновить информацию в таблице национальностей ("nationalities").</p>

    <p>Национальность: <input type="text" name="upd_nationality"/></p>

    <p>Id обновляемой записи: <input type="text" name="upd_record_id"/></p>
    <button type="submit">
        Update
    </button>
    <p><?php echo $res_update ?></p>
</form>
<hr>
<form action="nationalities.php" method="post">
    <p>Удалить запись в таблице национальностей ("nationalities").</p>

    <p>Id удаляемой записи: <input type="text" name="rem_record_id"/></p>
    <button type="submit">
        Remove
    </button>
    <p><?php echo $res_remove ?></p>
</form>
<hr>
<form action="nationalities.php" method="post">
    <p>Найти запись в таблице национальностей ("nationalities").</p>

    <p>Id искомой записи: <input type="text" name="find_record_id"/></p>
    <button type="submit">
        Find
    </button>
    <p><?php echo $res_find ?></p>
</form>
<hr>
<form action="nationalities.php" method="post">
    <p>Найти все записи в таблице национальностей ("nationalities").</p>

    <p>Все записи? <input type="text" name="find_record_yes"/></p>
    <button type="submit">
        FindAll
    </button>
    <p><?php echo $res_find_all ?></p>
</form>

</body>
</html>
