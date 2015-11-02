<?php

namespace Layer\Connector;

use Layer\Connector\ConnectorInterface;

class Connector implements ConnectorInterface
{


    public function connect()
    {
        require __DIR__ . '/../../../config/config.php';

        return new \PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['db_name'] . '', $config['db_user'], $config['db_password']);
    }

    public function connectClose($db)
    {
        // TODO: Implement connectClose() method.
    }

}