<?php

namespace Layer\Connector;
use PDO;

class MyConnect implements ConnectorInterface
{
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

        return $conn;
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