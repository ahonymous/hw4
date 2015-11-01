<?php

    require_once __DIR__.'/../../vendor/autoload.php';

    use Entity\EntityManager;

    if (isset($_GET['delete'])){

        $entity = array(
            'entity' => 'users',
            'id' => $_GET['delete']
        );

        $remove_user = new EntityManager();
        $remove_user->remove($entity);
        header("Location: index.php");
        exit;

    }

?>

<html>
    <head>
        <title>User</title>

        <link rel="stylesheet" href="../css/style.css">

        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    </head>

    <body class="users">

        <div class="container">

            <div id="header">
                <a href="/../shop/" class="btn btn-default">Shop</a>
                <a href="/../user/" class="btn btn-default">Users</a>
                <a href="/../user/AddUser.php" class="btn btn-default">Add User</a>
                <a href="/../products/index.php" class="btn btn-default">Products</a>
                <a href="/../products/AddProduct.php" class="btn btn-default">Add Product</a>
                <a href="/../orders/index.php" class="btn btn-default">Orders</a>
            </div>


            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Options</th>
                </thead>
                <tbody>

                <?php

                    $user = new EntityManager();
                    $list_users = $user->findAll('users');

                    foreach ($list_users as $user):
                ?>

                    <tr>
                        <td><?php print $user['id']; ?></td>
                        <td><?php print $user['user_name']; ?></td>
                        <td>
                            <a href="EditUser.php?id=<?php print $user['id']; ?>" class="btn btn-default">Edit</a>
                            <a href="?delete=<?php print $user['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>

                <?php endforeach; ?>

                </tbody>
            </table>
        </div>


    </body>
</html>