<?php

require __DIR__ . '/../config/autoload.php';

use Entity\EntityManager;
use User\User;

session_start();
?>

<html>
<head>
    <title>Login</title>

    <link rel="stylesheet" href="../css/style.css">

    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
          integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
          crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"
          integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"
            integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ=="
            crossorigin="anonymous"></script>
</head>

<body class="add-user">

<div class="container">

    <?php

    $entity = new EntityManager();
    $entity->db_init();

    if (isset($_POST['name'])){

        $user_login = new User();
        $user_login->setUserName($_POST['name']);

        $id = $entity->insert($user_login);
        $_SESSION['user'] = $id;

        header("Location: /user/index.php");
        exit;

    }

    ?>

    <form method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
        </div>

        <button type="submit" class="btn btn-default">Sign in</button>
    </form>

</div>


</body>
</html>


