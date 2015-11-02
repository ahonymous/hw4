<?php
/**
 * Created by PhpStorm.
 * User: hibro
 * Date: 01.11.15
 * Time: 22:06
 */

namespace Models;


use Layer\Manager\OrderInterface;
use Layer\Connector\Connector;

class Order implements OrderInterface
{
    /** Add new order
     * @param $post
     * @return mixed
     */
    public function addOrder($post){
        $pdo = new Connector();

        $addOrder = $pdo->db->prepare("INSERT INTO `orders` (`customer_id`, user_id, date) VALUES (:c_id, :u_id, NOW())");
        $addOrder->bindValue(':u_id', $post['user_id']);
        $addOrder->bindValue(':c_id', $post['customer_id']);
        $addOrder->execute();
        $order_id = $pdo->db->lastInsertId();

        if ($order_id){

            foreach ($post['stuffs'] as $stuff_id){

                $addStuffOrder = $pdo->db->prepare("INSERT INTO `orders_stuffs` (`order_id`, stuff_id) VALUES (:o_id, :s_id)");
                $addStuffOrder->bindValue(':o_id', $order_id);
                $addStuffOrder->bindValue(':s_id', $stuff_id);
                $addStuffOrder->execute();
            }

            return true;
        } else {
            return false;
        }
    }


    /** Get order by ID
     * @param $id
     * @return mixed
     */
    public function getOrder($id){
        $pdo = new Connector();

        $getSingleOrder = $pdo->db->prepare("SELECT * FROM `orders` WHERE `id`=:o_id");
        $getSingleOrder->bindValue(':o_id', $id);
        $result = $getSingleOrder->execute();

        if ($result){
            return $getSingleOrder->fetch();
        } else {
            return false;
        }
    }

    /** Delete order by ID
     * @param $post
     * @return mixed
     */
    public function delOrder($id){
        $pdo = new Connector();

        $dellOrder = $pdo->db->prepare("SELECT * FROM `orders` WHERE `id`=:o_id");
        $dellOrder->bindValue(':o_id', $id);

        return $dellOrder->execute();

    }

    /** Last  $count orders
     * @param $count
     * @return mixed
     */
    public function lastOrders($count){
        $pdo = new Connector();

        $lastOrders = $pdo->db->prepare("SELECT * FROM `orders` BY id DESC LIMIT :counter ");
        $lastOrders->bindValue(':coint', $count);
        $result = $lastOrders->execute();

        if ($result){
            return $lastOrders->fetchAll();
        } else {
            return false;
        }



    }

    /** Find orders by user/customer ID
     * @param $person_type
     * @param $id
     * @return mixed
     */
    public function findAll(){

        $pdo = new Connector();

        $find = $pdo->db->query("SELECT * FROM `orders`");
        $orders = $find->fetchAll();

        if ($orders){

            foreach ($orders as $order=>$value){

                $user = new User();
                $userInfo = $user->find('name',$value['user_id']);
                $stuffs[$order]['user_name'] = $userInfo;

                $customer = new Customer();
                $customerInfo = $customer->find('name', $value['id']);
                $stuffs[$order]['customer_name'] = $customerInfo;

            }

            return $orders;

        } else {
            return false;
        }

    }
}