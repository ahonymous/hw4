<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<h2>Teachers</h2>
<?php include './showTeachers.php' ?>
<form action=saveTeacher.php method="post">
    <fieldset>
        <legend>Create teacher</legend>
        <div>
            <label>
                Name <input type="text" name="name" required>
            </label>
        </div>
        <div>
            <label>
                Surname <input type="text" name="surname" required>
            </label>
        </div>
        <div>
        <input type="submit" name="submit" />
    </fieldset>
</form>
<form action=saveTeacher.php method="post">
    <fieldset>
        <legend>Update teacher</legend>
        <div>
            <label>
                id
                <select name="id">
                    <?php include './teachersId.php' ?>
                </select>
            </label>
        </div>
        <div>
            <label>
                Name <input type="text" name="name" required>
            </label>
        </div>
        <div>
            <label>
                Surname <input type="text" name="surname" required>
            </label>
        </div>
        <input type="submit" name="submit" />
    </fieldset>
</form>
<form action=saveTeacher.php method="post">
    <fieldset>
        <legend>Delete pupil</legend>
        <div>
            <label>
                id
                <select name="id">
                    <?php include './teachersId.php' ?>
                </select>
            </label>
        </div>
        <input type="hidden" name="delete">
        <input type="submit" name="submit" />
    </fieldset>
</form>

</body>
</html>