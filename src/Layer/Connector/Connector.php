<?php
/**
 * Created by PhpStorm.
 * User: hibro
 * Date: 31.10.15
 * Time: 20:12
 */

namespace Layer\Connector;


use PDO;


class Connector implements ConnectorInterface
{
    public $db;



    public function __construct(){
        require (__DIR__ . '/../../../config/config.php');

        $hostParam = "mysql:host=".$config['host'].";dbname=".$config['db_name'];

        return $this->connect($hostParam, $config['db_user'], $config['db_password']);
    }

    public function __destruct(){
        $this->connectClose();
    }



    public function connect($host, $user, $password){

        $this->db = new PDO($host, $user, $password);
        if (!$this->db){
            return false;
        } else {
            return $this->db;
        }
    }


    public function connectClose(){
        $this->db = null;
    }



}