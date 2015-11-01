<?php
require __DIR__ . '/vendor/autoload.php';
require (__DIR__ . '/config/config.php');

use Layer\Manager\UserManager;


$get=['name'=>'Da2rfdsfsd3n',
      'id'=>1,
      'email'=>'rupp21312@gmail.com'];
$user = new UserManager();
$res = $user->find('id',9);


