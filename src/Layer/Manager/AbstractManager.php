<?php

namespace Layer\Manager;
use Layer\Connector\Connector;

/**
 * Class AbstractManager
 * @package Layer\Manager
 */


abstract class AbstractManager implements ManagerInterface
{
    private $connection;
    private $connector;

    public function __construct() {
        $this->connector = new Connector();
        $this->connection = $this->connector->connect(
            $GLOBALS['config']['host'],
            $GLOBALS['config']['db_name'],
            $GLOBALS['config']['db_user'],
            $GLOBALS['config']['db_password']
        );
    }

    /**
     * @return mixed
     */
    public function getConnection()
    {
        return $this->connection;
    }

    public function closeConnection()
    {
        $this->connector->connectClose($this->connection);
    }

    /**
     * @param $query
     */
    public abstract function execute($query);
}
