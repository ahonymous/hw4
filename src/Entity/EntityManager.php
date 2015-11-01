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

    use EntityTrait;

    /**
     * @return PDO
     */
    public function connect()
    {
        require __DIR__ . '/../../config/config.php';

        return new \PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['db_name'] . '', $config['db_user'], $config['db_password']);
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

        $table = $entity['entity'];

        $connection = $this->connect();

        if ($table == 'products') {
            $price = $entity['price'];
            $name = $entity['name'];
            $query = $connection->prepare("INSERT INTO $table (name, price) VALUES (:name, :price)");
            $query->bindParam(":name", $name, PDO::PARAM_STR);
            $query->bindParam(":price", $price, PDO::PARAM_INT);
        } elseif ($table == 'orders') {
            $values = $entity['values'];
            $query = $connection->prepare("INSERT INTO $table (user_id, product_id) VALUES $values");
        } else {
            $name = $entity['name'];
            $query = $connection->prepare("INSERT INTO $table (user_name) VALUES (:name)");
            $query->bindParam(":name", $name, PDO::PARAM_STR);
        }

        $connection = null;
        return $query->execute();

    }

    /**
     * @param $entity
     * @return \PDOStatement
     */
    public function update($entity)
    {
        $table = $entity['entity'];
        $name = $entity['name'];
        $id = $entity['id'];
        $connection = $this->connect();
        if (isset($entity['price'])) {
            $price = $entity['price'];
            $sql = "UPDATE `$table` SET `name`=:name, `price`=:price WHERE id =" . $entity['id'];
            $query = $connection->prepare($sql);
            $query->bindValue(":name", $name, PDO::PARAM_STR);
            $query->bindValue(":price", $price, PDO::PARAM_INT);

        } else {
            $sql = "UPDATE `$table` SET user_name=:name WHERE id =" . $entity['id'];
            $query = $connection->prepare($sql);
            $query->bindValue(":name", $name, PDO::PARAM_STR);
        }

        $query->execute();

        return $query;


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

        if ($entityName == 'orders'){
            $query = $connection->query("SELECT O.id, U.user_name, P.name, P.price FROM $entityName AS O LEFT JOIN users AS U ON U.id = O.user_id LEFT JOIN products AS P ON P.id = O.product_id");
        } else {
            $query = $connection->query("SELECT * FROM $entityName");
        }

        return $query->fetchAll();

    }

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

