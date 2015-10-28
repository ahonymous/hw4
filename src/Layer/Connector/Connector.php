<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 28/10/15
 * Time: 23:37
 */

namespace Layer\Connector;


class Connector implements ConnectorInterface
{

    /**
     * @param $host
     * @param $user
     * @param $password
     * @return mixed
     */
    public function connect($host, $dbName, $user, $password)
    {
        return new \PDO('mysql:host='.$host.';dbname='.$dbName, $user, $password);
    }

    /**
     * @param $db
     * @return mixed
     */
    public function connectClose($db)
    {
        // TODO: Implement connectClose() method.
        $db = null;
    }
}