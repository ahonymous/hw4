<?php
namespace Layer\Connector;
use Layer\Connector\ConnectorInterface;
use PDO;
class Connector implements ConnectorInterface
{
    /**
     * @var \PDO
     */
    private $connect;
    /**
     * @return \PDO
     */
    public function connect()
    {
//        require __DIR__ . '/../../../config/autoload.php';
//        return new \PDO('mysql:host='. $config['host'] .';dbname='.$config['db_name'].'', $config['db_user'], $config['db_password']);
    }
    /**
     * @return null
     */
    public function connectClose()
    {
//        return $this->connection = null;
    }
}