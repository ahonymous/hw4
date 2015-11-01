<?php
/**
 * Created by PhpStorm.
 * User: hibro
 * Date: 01.11.15
 * Time: 23:24
 */

namespace Models;


use Layer\Manager\ManagerInterface;
use Layer\Connector\Connector;

class Stuff implements ManagerInterface
{
    protected $table = 'stuffs';

    /**
     * Insert new entity data to the DB
     * @param mixed $entity
     * @return mixed
     */
    public function insert($entity){
        if (isset($entity['name']) && isset($entity['customer_id']) && isset($entity['price'])){

            $pdo = new Connector();

            $ins = $pdo->db->prepare("INSERT INTO `".$this->table."` (`name`, `customer_id`,`description`, `price`) VALUES (:s_name, :c_id, :decr, :price)");
            $ins->bindValue(':s_name', $entity['name']);
            $ins->bindValue(':c_id', $entity['customer_id']);
            $ins->bindValue(':decr', $entity['description']);
            $ins->bindValue(':price', $entity['price']);

            $result = $ins->execute();
            if ($result){
                return $pdo->db->lastInsertId();
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

    /**
     * Update exist entity data in the DB
     * @param $entity
     * @return mixed
     */
    public function update($entity){
        if (isset($entity['name']) && isset($entity['price'])){

            $pdo = new Connector();

            $update = $pdo->db->prepare("UPDATE `".$this->table."` SET name=:name, price=:price, description=:descr WHERE id=:s_id ");
            $update->bindValue(':price', $entity['price']);
            $update->bindValue(':descr', $entity['description']);
            $update->bindValue(':s_id', $entity['id']);
            $update->bindValue(':name', $entity['name']);

            return $update->execute();
        } else {
            return false;
        }
    }

    /**
     * Delete entity data from the DB
     * @param $entity
     * @return mixed
     */
    public function remove($entity){

        $pdo = new Connector();

        $delete = $pdo->db->prepare("DELETE FROM `".$this->table."` WHERE id=:s_id");
        $delete->bindValue(':s_id', $entity['id']);

        return $delete->execute();
    }

    /**
     * Search entity data in the DB by Id
     * @param $entityName
     * @param $id
     * @return mixed
     */
    public function find($entityName, $id){

        $pdo = new Connector();

        $find = $pdo->db->prepare("SELECT :colm FROM `".$this->table."` WHERE `id`=:s_id");
        $find->bindValue(':s_id', $id);
        $find->bindVAlue(':colm', $entityName);
        $find->execute();
        $result = $find->fetch();

        return $result;

    }

    /**
     * Search all entity data in the DB
     * @param $entityName
     * @return array
     */
    public function findAll(){

        $pdo = new Connector();

        $find = $pdo->db->query("SELECT * FROM `".$this->table."`");
        $result = $find->fetchAll();
        return $result;

    }

    /**
     * Search all entity data in the DB like $criteria rules
     * @param $entityName
     * @param array $criteria
     * @return mixed
     */
    public function findBy($entityName, $criteria = []){

        $pdo = new Connector();
        $find = $pdo->db->query("SELECT :colm FROM `".$this->table."` WHERE `customer_id`=:c_id AND price BETWEEN (:min_price and :max_price)");
        $find->bindValue(':c_id', $entityName);
        $find->bindValue(':min_price', $criteria['min']);
        $find->bindValue(':max_price', $criteria['max']);
        $find->execute();

        $result = $find->fetchAll();
        return $result;
    }
}