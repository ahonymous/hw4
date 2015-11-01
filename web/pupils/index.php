<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<h2>Pupils</h2>
<?php include './showPupils.php' ?>
<form action=savePupil.php method="post">
    <fieldset>
        <legend>Create pupil</legend>
        <div>
            <label>
                Name <input type="text" name="name" required>
            </label>
        </div>
        <div>
            <label>
                Age <input type="number" name="age" required>
            </label>
        </div>
        <div>
            <label>
                group
                <select name="group_id">
                    <?php include 'groupNames.php' ?>
                </select>
            </label>
        </div>
        <input type="submit" name="submit" />
    </fieldset>
</form>
<form action=savePupil.php method="post">
    <fieldset>
        <legend>Update pupil</legend>
        <div>
            <label>
                id
                <select name="id">
                    <?php include './pupilsId.php' ?>
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
                Age <input type="number" name="age" required>
            </label>
        </div>
        <div>
            <label>
                group
                <select name="group_id">
                    <?php include 'groupNames.php' ?>
                </select>
            </label>
        </div>
        <input type="submit" name="submit" />
    </fieldset>
</form>
<form action=savePupil.php method="post">
    <fieldset>
        <legend>Delete pupil</legend>
        <div>
            <label>
                id
                <select name="id">
                    <?php include './pupilsId.php' ?>
                </select>
            </label>
        </div>
        <input type="hidden" name="delete">
        <input type="submit" name="submit" />
    </fieldset>
</form>

</body>
</html>