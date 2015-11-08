<?php

namespace Entity;

use Layer\Manager\AbstractManager;
use Layer\Connector\ConnectorInterface;
use PDO;
use Layer\Connector\Connector;

/**
 * Class EntityManager
 * @package Entity
 */
class EntityManager extends AbstractManager implements ConnectorInterface
{
    /**
     * @var PDO
     */
    private $connection;

    public function __construct()
    {
        $this->connection = new Connector();
        $this->connection = $this->connection->connect();

    }

    public function __destruct()
    {
        $this->connection = null;
    }

    public function db_init(){

        $query = $this->connection->query("CREATE TABLE `user` (id INT(11) AUTO_INCREMENT PRIMARY KEY, username VARCHAR(60), createdat INT(11), updatedat INT(11), deletedat INT(11) )");
        $query = $this->connection->query("CREATE TABLE `product` (id INT(11) AUTO_INCREMENT PRIMARY KEY, name VARCHAR(60), price INT(11), createdat INT(11), updatedat INT(11), deletedat INT(11) )");
        $query = $this->connection->query("CREATE TABLE `order` (id INT(11) AUTO_INCREMENT PRIMARY KEY, userid INT(11), productid INT(11), price INT(11))");

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
     * @param array $params
     * @return string
     */
    public function prepareSql($params = [])
    {
        $values = [];
        $fields = [];

        foreach ($params['properties'] as $key => $value){
            if ($value != '') {
                $values[] = "'" . $value . "'";
                $fields[] = "`" . $key . "`";
            }
        }

        $table = strtolower($params['entity']);

        $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)", $table, implode($fields, ','), implode($values, ','));

        return $sql;
    }


    /**
     * @param array $entity
     * @return int
     */
    public function insert($entity)
    {
        $params = $this->entityParse($entity);

        $sql = $this->prepareSql($params);

        $query = $this->connection->prepare($sql);

        $query->execute();

        return (int)$this->connection->lastInsertId();

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

        $table = new \ReflectionClass($entity);
        $table = strtolower($table->getShortName());

        $update = '';

        foreach ($values as $key => $val){
            if ($val && $key != 'id') {
                $update .= $key . ' = ' . $this->connection->quote($val) . ',';
            }
        }

        $update = trim($update, ",");

        $id = $values['id'];

        $query = $this->connection->prepare("UPDATE $table SET $update WHERE id=$id");

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

        $sql = "DELETE FROM `$table` WHERE `id`=" . $id;
        $result = $this->connection->query($sql);

        return $result;

    }

    /**
     * @param $entityName
     * @param $id
     * @return mixed
     */
    public function find($entityName, $id)
    {
        $query = $this->connection->query("SELECT * FROM $entityName WHERE id=$id");
        $query->execute();

        return $query->fetch();
    }

    /**
     * @param $entityName
     * @return array
     */
    public function findAll($entityName)
    {

        if ($entityName == 'order'){
            $query = $this->connection->prepare("SELECT O.id, U.username, P.name, P.price FROM `order` AS O LEFT JOIN user AS U ON U.id = O.userid LEFT JOIN product AS P ON P.id = O.productid");
        } else {
            $query = $this->connection->prepare("SELECT * FROM $entityName");
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

            $query = $this->connection->query("SELECT * FROM $entityName WHERE $field IN ($value)");

            $query->execute();

            return $query->fetchAll();

        } else {

            return false;

        }

    }

}

