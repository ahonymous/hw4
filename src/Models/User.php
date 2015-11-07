<?php
/**
 * Created by PhpStorm.
 * User: hibro
 * Date: 01.11.15
 * Time: 12:52
 */

namespace Models;

use Layer\Connector\Connector;
use Layer\Manager\AbstractManager;

class User extends AbstractManager
{
    protected $table = 'users';
    protected $pdo;

    public function __construct($db){
        $this->pdo = $db;
    }

    /**
 * Insert new entity data to the DB
 * @param mixed $entity
 * @return mixed
 */
    public function insert($entity){
        if (isset($entity['name'])){
            $ins = $this->pdo->prepare("INSERT INTO `".$this->table."` (`name`, `password`,`email`, `data_reg`) VALUES (:u_name, MD5(:u_password), :u_mail, NOW())");
            $ins->bindValue(':u_name', $entity['name']);
            $ins->bindValue(':u_password', $entity['password']);
            $ins->bindValue(':u_mail', $entity['email']);

            $result = $ins->execute();
            if ($result){
                return $this->pdo->lastInsertId();
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
        if (isset($entity['name'])){

            $update = $this->pdo->db->prepare("UPDATE `".$this->table."` SET name=:name, email=:email WHERE id=:u_id ");
            $update->bindValue(':u_id', $entity['id']);
            $update->bindValue(':email', $entity['email']);
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

        $delete = $this->pdo->db->prepare("DELETE FROM `".$this->table."` WHERE id=:u_id");
        $delete->bindValue(':u_id', $entity);

        return $delete->execute();
    }

    /**
     * Search entity data in the DB by Id
     * @param $entityName
     * @param $id
     * @return mixed
     */
    public function find($entityName, $id){

        $find = $this->pdo->db->prepare("SELECT :colm FROM `".$this->table."` WHERE `id`=:u_id");
        $find->bindValue(':u_id', $id);
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

        $find = $this->pdo->db->query("SELECT * FROM `".$this->table."`");
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

        $find = $this->pdo->db->query("SELECT :colm FROM `".$this->table."` WHERE `email`=:u_mail AND name=:u_name");
        $find->bindValue(':colm', $entityName);
        $find->bindValue(':u_name', $criteria['name']);
        $find->bindValue(':u_mail', $criteria['email']);
        $find->execute();

        $result = $find->fetchAll();
        return $result;
    }

}