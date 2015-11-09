<?php

require_once __DIR__.'/../../vendor/autoload.php';

use Entity\EntityManager;
use Product\Product;

?>

<html>
<head>
    <title>Add Product</title>

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

<body class="add-product">

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

    if (isset($_POST['name']) && isset($_POST['price'])){

        $product  = new Product();
        $product->setName($_POST['name']);
        $product->setPrice($_POST['price']);

        $date = new DateTime('now');
        $product->setCreatedAt($date->getTimestamp());

        $product_insert = new EntityManager();
        $product_insert->insert($product);

        header("Location: index.php");
        exit;

    }

    ?>

    <form method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
        </div>

        <div class="form-group">
            <label for="name">Price</label>
            <input type="text" class="form-control" id="name" placeholder="Name" name="price">
        </div>

        <button type="submit" class="btn btn-default">Add</button>
    </form>

</div>


</body>
</html>