<?php

namespace Layer\Connector;
use PDO;

class MyConnect implements ConnectorInterface
{
    private $connect;

    /**
     * @param $host
     * @param $user
     * @param $password
     * @param $db
     * @return mixed
     */

    public function connect($host, $user, $password, $db)
    {
        $conn = new PDO('mysql:host='.$host.';dbname='.$db, $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connect = $conn;
        return $this->connect;
    }

    /**
     * @param $db
     * @return mixed
     */
    public function connectClose($db)
    {
        // TODO: Implement connectClose() method.
    }

}