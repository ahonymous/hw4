<?php

ini_set("display_errors", 1);

require __DIR__ . '/../config/autoload.php';

use Layer\Connector\Connector;

$connection = new Connector();
$connection->setDb($config['db_name']);
$connection->setHost($config['host']);
$connection->setUser($config['db_user']);
$connection->setPassword($config['db_password']);

?>

<a href="/user">User</a>

