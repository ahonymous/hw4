<?php

namespace Layer\Connector;

use PDO;
use Layer\Manager\ManagerInterface;

class ConectBd implements ConnectorInterface, ManagerInterface
{

    /**
     * @var \PDO
     */
    private $db;

    /**
     * @param $host
     * @param $user
     * @param $password
     * @param $database
     * @return PDO
     */
    public function connect($host, $user, $password, $database)
    {
        $this->db = new PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $password);
        return $this->db;
    }

    /**
     * @param $db
     */
    public function connectClose($db)
    {
        $db = null;
    }

    public function createTableParent()
    {
        $table= "parent";
        $columns = "id INT( 11 ) AUTO_INCREMENT PRIMARY KEY, name VARCHAR( 50 ) NOT NULL,
        surname VARCHAR( 50 ) NOT NULL, sity VARCHAR( 50 ) NOT NULL" ;
        $this->db->exec("CREATE TABLE IF NOT EXISTS $table ($columns)");
    }

    public function createTableChildren()
    {
        $table= "children";
        $columns = "id INT( 11 ) AUTO_INCREMENT PRIMARY KEY, name VARCHAR( 50 ) NOT NULL,
        surname VARCHAR( 50 ) NOT NULL, sity VARCHAR( 50 ) NOT NULL, age INT( 3 ) NOT NULL" ;
        $this->db->exec("CREATE TABLE IF NOT EXISTS $table ($columns)");
    }

    /**
     * @param $dataObject
     */
    public function insertParent($dataObject)
    {
        $sql = "INSERT INTO parent (name, surname, sity) VALUES (?, ?, ?)";
        $data = $this->db->prepare($sql);
        $data->execute([$dataObject->getName(), $dataObject->getSurname(), $dataObject->getSity()]);
    }

    /**
     * @param $dataObject
     */
    public function insertChildren($dataObject)
    {
        $sql = "INSERT INTO children (name, surname, sity, age) VALUES (?, ?, ?, ?)";
        $data = $this->db->prepare($sql);
        $data->execute([$dataObject->getName(), $dataObject->getSurname(), $dataObject->getSity() , $dataObject->getAge() ]);
    }
    /**
     * @param $entityName
     * @return array
     */
    public function findAll($entityName)
    {
        $data = $this->db->prepare('SELECT * FROM '.$entityName);
        $data->execute();
        return $data->fetchAll();
    }

    /**
     * @return array
     */
    public function LeftJoin()
    {
        $sql = "SELECT * FROM children left join parent on (children.id = parent.id)";
        $data = $this->db->prepare($sql);
        $data->execute();
        return $data->fetchAll();
    }


    /**
     * @param $name
     * @param $surname
     * @param $id
     */
    public function update($name, $surname, $id)
    {
        $sql = "UPDATE user SET name = :name, surname = :surname WHERE id = :id";
        $data = $this->db->prepare($sql);
        $data->bindParam(':name', $name, PDO::PARAM_STR);
        $data->bindParam(':surname', $surname, PDO::PARAM_STR);
        $data->bindParam(':id', $id, PDO::PARAM_INT);
        $data->execute();
    }


    /**
     * @param $tableName
     * @param $id
     */
    public function remove($tableName, $id)
    {
        $sql = "DELETE FROM".$tableName."WHERE id =  :id";
        $data = $this->db->prepare($sql);
        $data->bindParam(':id', $id, PDO::PARAM_INT);
        $data->execute();
    }

    /**
     * @param $entityName
     * @param $id
     * @return array
     */
    public function find($entityName, $id)
    {
        $data = $this->db->prepare('SELECT * FROM'.$entityName.'WHERE id=:id');
        $data->bindParam(':id', $id, PDO::PARAM_INT);
        $data->execute();
        return $data->fetchAll();
    }

    /**
     * @param $entityName
     * @param array $criteria
     * @return array
     */
    public function findBy($entityName, $criteria = [])
    {
        if ($entityName == 'user')
        {
            $data = $this->db->prepare('SELECT * FROM user WHERE name=:name AND surname=:surname');
            $data->bindValue(':name', $criteria['name']);
            $data->bindValue(':surname', $criteria['surname']);
            $data->execute();
            return $data->fetchAll();
        }
    }
}