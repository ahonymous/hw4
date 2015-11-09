<?php

    require_once __DIR__.'/../../vendor/autoload.php';

    use Entity\EntityManager;

?>

<html>
<head>
    <title>Add User</title>

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

        <div id="header">
            <a href="/../shop/" class="btn btn-default">Shop</a>
            <a href="/../user/" class="btn btn-default">Users</a>
            <a href="/../user/AddUser.php" class="btn btn-default">Add User</a>
            <a href="/../products/index.php" class="btn btn-default">Products</a>
            <a href="/../products/AddProduct.php" class="btn btn-default">Add Product</a>
            <a href="/../orders/index.php" class="btn btn-default">Orders</a>
        </div>

        <?php

            if (isset($_POST['name'])){

                $date = new DateTime('now');
                $date = $date->getTimestamp();

                $user = new \User\User();
                $user->setId($_GET['id']);
                $user->setUserName($_POST['name']);
                $user->setUpdatedAt($date);

                $user_update = new EntityManager();
                $user_update->update($user);
                header("Location: index.php");
                exit;

            }

            if (isset($_GET['id'])){

                $get_user = new EntityManager();
                $user = $get_user->find('user', $_GET['id']);

            }

        ?>

        <form method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?php print $user['username']; ?>">
            </div>

            <button type="submit" class="btn btn-default">Edit</button>
        </form>

    </div>


</body>
</html>