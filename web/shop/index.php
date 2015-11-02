<?php

require_once __DIR__.'/../../vendor/autoload.php';

use Entity\EntityManager;
use Order\Order;

session_start();

if (isset($_GET['card']) && isset($_GET['confirm']) && $_GET['confirm'] == true && isset($_SESSION['add-to-card'])){

    foreach ($_SESSION['add-to-card'] as $product_id) {
        $order = new Order();
        $order->setUserId('23');
        $order->setProductId($product_id);
        $add_order = new EntityManager();
        $add_order->insert($order);
    }

    unset($_SESSION['add-to-card']);

}

?>

<html>
<head>
    <title>Shop</title>

    <link rel="stylesheet" href="../css/style.css">

    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
</head>

<body class="shop">

<div class="container">

    <?php if (isset($_GET['card']) && $_GET['card'] == 'show'): ?>

        <div id="header">
            <a href="?card=hide" class="btn btn-default">Hide Card</a>
        </div>

        <table class="table">
            <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Options</th>
            </thead>
            <tbody>

            <?php

            if (isset($_GET['delete']) && isset($_GET['card'])){
                $key = array_search($_GET['delete'], $_SESSION['add-to-card']);
                unset($_SESSION['add-to-card'][$key]);
                header("Location: ?card=show");
                exit;
            }

            $criteria = [];

            if (isset($_SESSION['add-to-card'])){
                $criteria = array(
                    'id' => $_SESSION['add-to-card']
                );
            }

            $product = new EntityManager();
            $list_products = $product->findBy('product', $criteria);

            if ($list_products){

            foreach ($list_products as $product):
                ?>

                <tr>
                    <td><?php print $product['id']; ?></td>
                    <td><?php print $product['name']; ?></td>
                    <td><?php print $product['price']; ?>$</td>
                    <td>
                        <a href="?card=show&delete=<?php print $product['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>

            <?php endforeach; } ?>

            </tbody>
        </table>

        <a href="?card=show&confirm=true" class="btn btn-success">Confirm</a>

    <?php else : ?>

        <div id="header">
            <a href="?card=show" class="btn btn-default">Show Card</a>
            <a href="/../orders/index.php" class="btn btn-default">Orders</a>
        </div>


        <?php

            if (isset($_GET['add-to-card'])){
                $_SESSION['add-to-card'][] = $_GET['add-to-card'];
            } elseif (isset($_GET['remove-from-card'])){
                $remove_product = array_search( $_GET['remove-from-card'], $_SESSION['add-to-card'] );
                unset($_SESSION['add-to-card'][$remove_product]);
            }



            $product = new EntityManager();
            $list_products = $product->findAll('product');

            foreach ($list_products as $product):
            ?>

            <div class="col-md-4 product">
                <h4><?php print $product['name']; ?></h4>
                <h5>Price: <?php print $product['price']; ?>$</h5>

                <?php
                if (isset($_SESSION['add-to-card'])){
                    $added_product = array_search( $product['id'], $_SESSION['add-to-card'] );
                } else {
                    $added_product = '';
                }
                if ($added_product != '' || $added_product === 0 ) : ?>
                    <a href="?remove-from-card=<?php print $product['id']; ?>" class="btn btn-success">Remove from Card</a>
                <?php else : ?>
                    <a href="?add-to-card=<?php print $product['id']; ?>" class="btn btn-success">Add to Card</a>
                <?php endif; ?>

            </div>

        <?php endforeach; ?>
    <?php endif; ?>



</div>


</body>
</html>