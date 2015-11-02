<?php

namespace Entity;

use Layer\Manager\AbstractManager;
use Layer\Connector\ConnectorInterface;
use PDO;

/**
 * Class EntityManager
 * @package Entity
 */
class EntityManager extends AbstractManager implements ConnectorInterface
{

    /**
     * @return PDO
     */
    public function connect()
    {
        require __DIR__ . '/../../config/config.php';

        return new \PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['db_name'] . '', $config['db_user'], $config['db_password']);
    }

    public function db_init(){

        $connection = $this->connect();

        $query = $connection->query("CREATE TABLE `user` (id INT(11) AUTO_INCREMENT PRIMARY KEY, username VARCHAR(60), createdat INT(11), updatedat INT(11), deletedat INT(11) )");
        $query = $connection->query("CREATE TABLE `product` (id INT(11) AUTO_INCREMENT PRIMARY KEY, name VARCHAR(60), price INT(11), createdat INT(11), updatedat INT(11), deletedat INT(11) )");
        $query = $connection->query("CREATE TABLE `order` (id INT(11) AUTO_INCREMENT PRIMARY KEY, userid INT(11), productid INT(11), price INT(11))");

    }


    /**
     * @param $db
     * @return null
     */
    public function connectClose($db)
    {
        return $this->connection = null;
    }

    /**
     * @param mixed $entity
     * @return \PDOStatement
     */
    public function insert($entity)
    {
        $values = [];
        $methods = get_class_methods($entity);
        foreach ($methods as $method) {
            if (strpos($method, 'get') === 0) {
                $values[strtolower(substr($method, 3))] = $entity->$method();
            }
        }


        $connection = $this->connect();
        $table = new \ReflectionClass($entity);
        $table = strtolower($table->getShortName());

        $field = [];
        $vals = [];

        foreach ($values as $key => $val){
            if ($val) {
                $field[] = $key;
                $vals[] = $connection->quote($val);
            }
        }

        $query = $connection->prepare("INSERT INTO `$table` (`" . implode($field, "`,`") . "`) VALUES (" . implode($vals, ",") . ")");

        return $query->execute();

    }

    /**
     * @param $entity
     * @return \PDOStatement
     */
    public function update($entity)
    {
        $values = [];
        $methods = get_class_methods($entity);
        foreach ($methods as $method) {
            if (strpos($method, 'get') === 0) {
                $values[strtolower(substr($method, 3))] = $entity->$method();
            }
        }

        $connection = $this->connect();

        $table = new \ReflectionClass($entity);
        $table = strtolower($table->getShortName());

        $update = '';

        foreach ($values as $key => $val){
            if ($val && $key != 'id') {
                $update .= $key . ' = ' . $connection->quote($val) . ',';
            }
        }

        $update = trim($update, ",");

        $id = $values['id'];

        $query = $connection->prepare("UPDATE $table SET $update WHERE id=$id");

        return $query->execute();
    }

    /**
     * @param $entity
     * @return \PDOStatement
     */
    public function remove($entity)
    {

        $table = $entity['entity'];
        $id = $entity['id'];
        $connection = $this->connect();
        $sql = "DELETE FROM `$table` WHERE `id`=" . $id;
        $result = $connection->query($sql);

        return $result;

    }

    /**
     * @param $entityName
     * @param $id
     * @return mixed
     */
    public function find($entityName, $id)
    {

        $connection = $this->connect();
        $query = $connection->query("SELECT * FROM $entityName WHERE id=$id");
        $query->execute();

        return $query->fetch();
    }

    /**
     * @param $entityName
     * @return array
     */
    public function findAll($entityName)
    {

        $connection = $this->connect();

        if ($entityName == 'order'){
            $query = $connection->prepare("SELECT O.id, U.username, P.name, P.price FROM `order` AS O LEFT JOIN user AS U ON U.id = O.userid LEFT JOIN product AS P ON P.id = O.productid");
        } else {
            $query = $connection->prepare("SELECT * FROM $entityName");
        }

        $query->execute();

        return $query->fetchAll();

    }

    /**
     * @param $entityName
     * @param array $criteria
     * @return array|bool
     */
    public function findBy($entityName, $criteria = [])
    {
        $field = key($criteria);
        if (isset($criteria[$field]) && isset($criteria[$field]) !== []){

            if (gettype($criteria[$field]) == 'array'){
                $value = implode(',', $criteria[$field]);
            } else {
                $value = $criteria['user_name'];
            }

            $connection = $this->connect();
            $query = $connection->query("SELECT * FROM $entityName WHERE $field IN ($value)");

            $query->execute();

            return $query->fetchAll();

        } else {

            return false;

        }

    }

}

