<?php
/**
 * Created by PhpStorm.
 * User: hibro
 * Date: 01.11.15
 * Time: 12:52
 */

namespace Layer\Manager;
use Layer\Connector\Connector;

class UserManager extends AbstractManager
{

    protected $table = 'users';

    /**
 * Insert new entity data to the DB
 * @param mixed $entity
 * @return mixed
 */
    public function insert($entity){
        if (isset($entity['name'])){

            $pdo = new Connector();

            $ins = $pdo->db->prepare("INSERT INTO `".$this->table."` (`name`, `password`,`email`, `data_reg`) VALUES (:u_name, MD5(:u_password), :u_mail, NOW())");
            $ins->bindValue(':u_name', $entity['name']);
            $ins->bindValue(':u_password', $entity['password']);
            $ins->bindValue(':u_mail', $entity['email']);

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
        if (isset($entity['name'])){

            $pdo = new Connector();

            $update = $pdo->db->prepare("UPDATE `".$this->table."` SET name=:name, email=:email WHERE id=:u_id ");
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

        $delete = $pdo->db->prepare("DELETE FROM `".$this->table."` WHERE id=:u_id");
        $delete->bindValue(':u_id', $entity['id']);

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

        $find = $pdo->db->prepare("SELECT :colm FROM `".$this->table."` WHERE `id`=:u_id");
        $find->bindValue(':u_id', $id);
        $find->bindVAlue(':colm', $entityName);
        $find->execute();
        $result = $find->fetchAll();

        return $result;

    }

    /**
     * Search all entity data in the DB
     * @param $entityName
     * @return array
     */
    public function findAll(){

        $pdo = new Connector();

        $find = $pdo->db->query("SELECT * FROM `users`");
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

        foreach ($criteria as $criter=>$val){
            if ($val!=''){

            }      }
    }

}