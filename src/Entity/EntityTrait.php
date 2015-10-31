<?php

namespace Entity;

/**
 * Class EntityTrait
 * @package Entity
 */
trait EntityTrait
{
    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \DateTime
     */
    private $deletedAt;

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * @param \DateTime $deletedAt
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;
    }

    /**
     * @return array
     */
    function getKeys() {
        $keys = [];
        foreach($this as $key => $value) {
            if ($value) {
                array_push($keys, "`".$key."`");
            }
        }
        return $keys;
    }
    /**
     * @return array
     */
    function getValues() {
        $values = [];
        foreach($this as $key => $value) {
            if ($value) {
                array_push($values, "'".$value."'");
            }
        }
        return $values;
    }
}