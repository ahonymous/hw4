<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<h2>Groups</h2>
<?php include './showGroups.php' ?>
<form action=./saveGroup.php method="post">
    <fieldset>
        <legend>Create group</legend>
        <div>
            <label>
                Name <input type="text" name="name" required>
            </label>
        </div>
        <div>
            <label>
                Size <input type="number" name="size" required>
            </label>
        </div>
        <input type="submit" name="submit" />
    </fieldset>
</form>

</body>
</html>