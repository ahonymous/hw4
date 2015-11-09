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
    protected $pdo;

    /** Summ all deals this customer
     * @param $id
     * @return mixed
     */
    public function allProfit($id){

        $find = $this->pdo->db->prepare("SELECT SUM(`value`) as `summ` FROM `orders` WHERE `customer_id`=:u_id");
        $find->bindValue(':u_id', $id);
        $result = $find->execute();

        if ($result) {
            return $find->fetch();
        }
    }

    public function profitBy($period, $id){

        $find = $this->pdo->db->prepare("SELECT SUM(`value`) as `summ` FROM `order` WHERE `customer_id`=u:id ");
        $find->bindValue(':u_id', $id);
        $result = $find->execute();

        if ($result) {
            return $find->fetch();
        }
    }


}