<?php

require __DIR__ . '/../config/autoload.php';

use \Layer\Connector\DataBaseConnector as DBConnector;


$connector = DBConnector::connect($config['db_name'], $config['db_user'], $config['db_password']);

$controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'books';
$controllerName = ucfirst($controllerName) . 'Controller';
$controllerName = 'Controllers\\' . $controllerName;

$controller = new $controllerName($connector);
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';
$actionName = $actionName . 'Action';
$response = $controller->$actionName();
echo $response;