<?php
/**
 * Created by PhpStorm.
 * User: hibro
 * Date: 01.11.15
 * Time: 19:54
 */

namespace Models;

use Layer\Connector\Connector;

class Customer extends User
{
    protected $table = 'customers';

    /** Summ all deals this customer
     * @param $id
     * @return mixed
     */
    public function allProfit($id){
        $pdo = new Connector();

        $find = $pdo->db->prepare("SELECT SUM(`value`) FROM `orders` WHERE `customer_id`=:u_id");
        $find->bindValue(':u_id', $id);
        $find->execute();
        $result = $find->fetch();

        return $result;

    }


}