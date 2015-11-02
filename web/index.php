<?php

require __DIR__ . '/../config/autoload.php';

$connector = new \Layer\Connector\Connector($config['db_name'], $config['db_user'], $config['db_password']);

$researcher = new \Layer\Manager\ResearcherManager($connector);
$project = new \Layer\Manager\ProjectManager($connector);
$nationality = new \Layer\Manager\NationalityManager($connector);
$grant = new \Layer\Manager\GrantManager($connector);

if (isset($_POST['ins_full_name'])
    && isset($_POST['ins_experience'])
    && isset($_POST['ins_degree'])
    && isset($_POST['ins_nationality_id'])) {
    $researcher->insert(array(
        'full_name' => htmlspecialchars($_POST['ins_full_name']),
        'experience' => htmlspecialchars($_POST['ins_experience']),
        'degree' => htmlspecialchars($_POST['ins_degree']),
        'nationality_id' => htmlspecialchars($_POST['ins_nationality_id'])
    ));

    foreach ($_POST as $post) {
        unset($post);
    }
    $res_insert = 'Вставка в таблицу исследователей успешна';
} else {
    $res_insert = '';
}

if (isset($_POST['upd_full_name'])
    && isset($_POST['upd_experience'])
    && isset($_POST['upd_degree'])
    && isset($_POST['upd_nationality_id'])
    && isset($_POST['upd_record_id'])) {
    $researcher->update($_POST['upd_record_id'],array(
        'full_name' => htmlspecialchars($_POST['upd_full_name']),
        'experience' => htmlspecialchars($_POST['upd_experience']),
        'degree' => htmlspecialchars($_POST['upd_degree']),
        'nationality_id' => htmlspecialchars($_POST['upd_nationality_id'])
    ));

    foreach ($_POST as $post) {
        unset($post);
    }
    $res_update = 'Обновление в таблице исследователей успешно';
} else {
    $res_update = '';
}

if (isset($_POST['rem_record_id'])) {
    $researcher->remove($_POST['rem_record_id']);

    foreach ($_POST as $post) {
        unset($post);
    }
    $res_remove = 'Удаление в таблице исследователей успешно';
} else {
    $res_remove = '';
}

if (isset($_POST['find_record_id'])) {
    $tmpRes = $researcher->find($_POST['find_record_id']);

    foreach ($_POST as $post) {
        unset($post);
    }
    $res_find = '';
    foreach ($tmpRes as $record) {
        $res_find .= $record. '<br>';
    }
} else {
    $res_find = '';
}

if (isset($_POST['find_record_yes'])) {
    $tmpRes = $researcher->findAll();

    foreach ($_POST as $post) {
        unset($post);
    }
    $res_find_all = '';
    foreach ($tmpRes as $record) {
        $res_find_all .= $record. '<br>';
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
<form action="index.php" method="post">
    <p>Вставить информацию в таблицу исследователей ("researchers").</p>
    <p>ФИО: <input type="text" name="ins_full_name" /></p>
    <p>Опыт работы: <input type="text" name="ins_experience" /></p>
    <p>Степень: <input type="text" name="ins_degree" /></p>
    <p>Id национальности: <input type="text" name="ins_nationality_id" /></p>
    <button type="submit">
        Insert
    </button>
    <p><?php echo $res_insert?></p>
</form>
<hr>
<form action="index.php" method="post">
    <p>Обновить информацию в таблице исследователей ("researchers").</p>
    <p>ФИО: <input type="text" name="upd_full_name" /></p>
    <p>Опыт работы: <input type="text" name="upd_experience" /></p>
    <p>Степень: <input type="text" name="upd_degree" /></p>
    <p>Id национальности: <input type="text" name="upd_nationality_id" /></p>
    <p>Id обновляемой записи: <input type="text" name="upd_record_id" /></p>
    <button type="submit">
        Update
    </button>
    <p><?php echo $res_update?></p>
</form>
<hr>
<form action="index.php" method="post">
    <p>Удалить запись в таблице исследователей ("researchers").</p>
    <p>Id удаляемой записи: <input type="text" name="rem_record_id" /></p>
    <button type="submit">
        Remove
    </button>
    <p><?php echo $res_remove?></p>
</form>
<hr>
<form action="index.php" method="post">
    <p>Найти запись в таблице исследователей ("researchers").</p>
    <p>Id искомой записи: <input type="text" name="find_record_id" /></p>
    <button type="submit">
        Find
    </button>
    <p><?php echo $res_find?></p>
</form>
<hr>
<form action="index.php" method="post">
    <p>Найти все записи в таблице исследователей ("researchers").</p>
    <p>Все записи? <input type="text" name="find_record_yes" /></p>
    <button type="submit">
        FindAll
    </button>
    <p><?php echo $res_find_all?></p>
</form>

</body>
</html>
