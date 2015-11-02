<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/conf/config.php';

use Models\User;
use Models\Customer;

if (isset($_GET['action'])){

    switch ($_GET['action']){
        case 'users':
            if ($_GET['subaction']){
                switch($_GET['subaction']){

                    case 'del':
                        $user = new User();
                        $del = $user->remove($_POST['id']);

                        if ($del){
                            echo 'Пользователь удален';
                        } else {
                            echo 'Возникла ошибка';
                        }

                        break;

                    case 'add':
                        $user = new User();
                        $addUser = $user->insert($_POST);

                        if ($addUser){
                            echo '<script type="text/javascript">';
                            echo 'window.location.href="/index.php?action=users";';
                            echo '</script>';
                        } else {
                            echo 'Ошибка при добавлении нового пользователя';
                        }

                    break;

                    case 'find':
                        $user = new User();
                        $find = $user->find($_POST['colm'], $_POST['id']);

                        $smarty->assign('user', $find);
                        $smarty->display('serch_resul.tpl');

                        break;

                    default:

                        $user = new User();
                        $allUsers = $user->findAll();

                        $smarty->assign('users',$allUsers);
                        $smarty->display('users.tpl');

                        break;
                }
            }
            break;
        case 'customers':
            if ($_GET['subaction']){
                switch($_GET['subaction']){

                    case 'del':
                        $customer = new Customer();
                        $del = $customer->remove($_POST['id']);

                        if ($del){
                            echo 'Продавец удален';
                        } else {
                            echo 'Возникла ошибка';
                        }

                        break;

                    case 'add':
                        $customer = new Customer();
                        $addCustomer = $customer->insert($_POST);

                        if ($addUser){
                            echo '<script type="text/javascript">';
                            echo 'window.location.href="/index.php?action=customers";';
                            echo '</script>';
                        } else {
                            echo 'Ошибка при добавление нового продавца';
                        }

                        break;

                    case 'find':
                        $customer = new Customer();
                        $find = $customer->find($_POST['colm'], $_POST['id']);

                        $smarty->assign('custoner', $find);
                        $smarty->display('serch_result_customer.tpl');

                        break;

                    default:

                        $user = new User();
                        $allUsers = $user->findAll();

                        $smarty->assign('users',$allUsers);
                        $smarty->display('users.tpl');

                        break;
                }
            }
            break;

        case 'order':
            if ($_GET['subaction']){
                switch($_GET['subaction']) {
                    case '':

                        break;
                }
            } else {
                $user = new User();
                $allUsers = $user->findAll();

                $customer = new Customer();
                $allCustomers = $customer->findAll();
            }


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



