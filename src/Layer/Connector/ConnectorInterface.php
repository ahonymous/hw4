<?php

namespace Layer\Connector;

/**
 * Interface ConnectorInterface
 * @package Layer\Connector
 */
interface ConnectorInterface
{
    /**
     * @param $host
     * @param $user
     * @param $password
     * @param $db
     * @return mixed
     */
    public function connect($host, $user, $password, $db);

    /**
     * @param $db
     * @return mixed
     */
    public function connectClose($db);
}