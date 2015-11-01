<?php

namespace Layer\Connector;

class Connector implements ConnectorInterface
{
    private $pdo;
    private $dbname;

    public function __construct($dbname, $user, $password)
    {
        $this->dbname = $dbname;
        $dbconfig = 'mysql:host=localhost;dbname=' . $dbname . ';charset=UTF8';
        $this->pdo = new \PDO($dbconfig, $user, $password);
        if (!$this->pdo) {
            throw new \Exception('Error connecting to the database');
        }
    }

    public function connect($host, $user, $password)
    {
        return $this->pdo = new \PDO($host, $user, $password);
    }

    public function connectClose($db)
    {
        if ($this->dbname == $db) {
            $this->pdo = null;
        } else {
            throw new \Exception('Error: wrong database name');
        }
    }
}