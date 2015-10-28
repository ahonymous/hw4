<?php
ini_set('display_errors', 'on');
require __DIR__ . '/../config/autoload.php';
use Layer\Connector\Connector;
$connector = new Connector();
$conn = $connector->connect(
    $GLOBALS['config']['host'],
    $GLOBALS['config']['db_name'],
    $GLOBALS['config']['db_user'],
    $GLOBALS['config']['db_password']
);
$sql = "SELECT FIRST_NAME FROM USER";

foreach ($conn->query($sql) as $row) {
    print $row['FIRST_NAME'] . "\t";
}
