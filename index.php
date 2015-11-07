<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/conf/config.php';

error_reporting(E_ALL | E_STRICT) ;
ini_set('display_errors', 'On');

use Models\User;
use Models\Customer;
use Models\Stuff;
use Models\Order;
use Layer\Connector\Connector;

$db = new Connector();

if (isset($_GET['action'])){
    
    switch ($_GET['action']){
        case 'users':
            if ($_GET['subaction']){
                switch($_GET['subaction']){

                    case 'del':
                        $user = new User($db);
                        $del = $user->remove($_POST['id']);

                        if ($del){
                            echo 'Пользователь удален';
                        } else {
                            echo 'Возникла ошибка';
                        }

                        break;

                    case 'add':
                        $user = new User($db);
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
                        $user = new User($db);
                        $find = $user->find($_POST['colm'], $_POST['id']);

                        $smarty->assign('user', $find);
                        $smarty->display('serch_resul.tpl');

                        break;

                    default:

                        $user = new User($db);
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
                        $customer = new Customer($db);
                        $del = $customer->remove($_POST['id']);

                        if ($del){
                            echo 'Продавец удален';
                        } else {
                            echo 'Возникла ошибка';
                        }

                        break;

                    case 'add':
                        $customer = new Customer($db);
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
                        $customer = new Customer($db);
                        $find = $customer->find($_POST['colm'], $_POST['id']);

                        $smarty->assign('custoner', $find);
                        $smarty->display('serch_result_customer.tpl');

                        break;

                    default:

                        $customer = new Customer($db);
                        $allUsers = $customer->findAll();

                        $smarty->assign('customers',$allUsers);
                        $smarty->display('customers.tpl');

                        break;
                }
            }
            break;

        case 'order':
            if ($_GET['subaction']){
                switch($_GET['subaction']) {

                    case 'add_customer_stuffs':
                        $stuff = new Stuff($db);
                        $stuffs = $stuff->find('customer_id', $_POST['id']);
                        if ($stuffs) {
                            echo json_encode($stuffs);
                        } else {
                            echo 'false';
                        }
                        break;
                    case 'add':
                        $order = new Order($db);
                        $result = $order->addOrder($_POST);
                        if ($result){
                            echo '<script type="text/javascript">';
                            echo 'window.location.href="/index.php?action=order";';
                            echo '</script>';
                        } else {
                            echo 'Возникла ошибка';
                        }
                        break;
                    default:
                        $order = new Order($db);
                        $orders = $order->findAll();

                        $smarty->assign('orders', $orders);
                        $smarty->display('order.tpl');
                }
            } else {
                $order = new Order($db);
                $orders = $order->findAll();

                $smarty->assign('orders', $orders);
                $smarty->display('orders.tpl');
            }


            break;
        case 'stuff':
            $stuff = new Stuff($db);
            $allStufs = $stuff->findAll();

            $smarty->display('stuff.tpl');
            break;
    }
} else {

    $smarty->display('index.tpl');

}



