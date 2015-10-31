<?php

namespace Entity;

use Layer\Manager\AbstractManager;
use Layer\Connector\ConnectorInterface;

/**
 * Class EntityManager
 * @package Entity
 */
class EntityManager extends AbstractManager implements ConnectorInterface
{

    /**
     * @var
     */
    private $db_name;

    /**
     * @var
     */
    private $db_user;

    /**
     * @var
     */
    private $db_password;

    /**
     * @var
     */
    private $db_host;

    /**
     * @var
     */
    private $connection;

    /**
     * @param $params
     */
    public function __construct($params){

        $this->db_name = $params['db_name'];
        $this->db_user = $params['db_user'];
        $this->db_host = $params['host'];
        $this->db_password = $params['db_password'];

    }

    /**
     * @param $host
     * @param $db
     * @param $user
     * @param $password
     * @return \PDO
     */
    public function connect($host, $db, $user, $password)
    {

        try {

            return $this->connection = new \PDO('mysql:host='.$host.';dbname='.$db.'', $user, $password);

        } catch (\PDOException $e) {

            print "Error!: " . $e->getMessage() . "<br/>";
            die();

        }

    }

    /**
     * @param $db
     * @return null
     */
    public function connectClose($db)
    {
        return $this->connection = null;
    }


    public function insert($entity)
    {

        $connection = $this->connection;
        $query = $connection->prepare("INSERT INTO 'users' (name) VALUE (?)");
        $query->bindParam(1, 'Roma');
        $query->execute();
        $connection = null;

        return $query;

    }

    public function update($entity)
    {
        // TODO: Implement update() method.
    }

    public function remove($entity)
    {
        // TODO: Implement remove() method.
    }

    public function find($entityName, $id)
    {
        // TODO: Implement find() method.
    }

    public function findAll($entityName)
    {
        // TODO: Implement findAll() method.
    }

    public function findBy($entityName, $criteria = [])
    {
        // TODO: Implement findBy() method.
    }


}