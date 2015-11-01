<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/conf/config.php';

use Models\User;
use Models\Customer;

if (isset($_GET['action'])){
    switch ($_GET['action']){
        case 'users':
            if ($_GET['subaction']!=''){
                switch($_GET['subaction']){
                    case 'del':
                        $user = new User();
                        $del = $user->remove($_GET);
                        if ($del){
                            echo 'Пользователь удален';
                        } else {
                            echo 'Возникла ошибка';
                        }
                        break;
                }
            }
            $smarty->display('users.tpl');
            break;
        case 'managers':
            $smarty->display('managers.tpl');
            break;
        case 'stuff':
            $smarty->display('stuff.tpl');
            break;
    }
} else {
    $get = [
        'name'=>'Vasia evrey',
        'email'=>'hitruy@gmail.com',
        'password'=>'435345'
    ];


    $user = new Customer();
    $res = $user->insert($get);
    print_r($res);
    $smarty->assign('users',$res);
    $smarty->display('index.tpl');
}


$get=['name'=>'John',
      'password'=>'krasnu123',
      'email'=>'rupp21312@gmail.com'];



