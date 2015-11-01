<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 31/10/15
 * Time: 14:39
 */

namespace Entity;


abstract class Entity
{
    private $entityName;

    public function __construct($name) {
        $this->entityName = $name;
    }

    /**
     * @return mixed
     */
    public function getEntityName()
    {
        return $this->entityName;
    }

    /**
     * @return string
     */
    public static abstract function initScript();
}