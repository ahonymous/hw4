<?php

namespace Layer\Connector;

use Layer\Connector\ConnectorInterface;

class Connector implements ConnectorInterface
{

    /**
     * @var
     */
    private $host;

    /**
     * @var
     */
    private $db;

    /**
     * @var
     */
    private $user;

    /**
     * @var
     */
    private $password;

    /**
     * @return \PDO
     */
    public function connect()
    {
        return new \PDO('mysql:host='.$this->host.';dbname='.$this->db.'', $this->user, $this->password);
    }

    public function connectClose($db)
    {
        // TODO: Implement connectClose() method.
    }

    /**
     * @param mixed $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @param mixed $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }




}