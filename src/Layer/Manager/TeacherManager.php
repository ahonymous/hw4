<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 01/11/15
 * Time: 12:40
 */

namespace Layer\Manager;


class TeacherManager extends Manager
{

    private $connection;

    public function __construct() {
        parent::__construct();
        $this->connection = parent::getConnection();
    }

    /**
     * Insert new entity data to the DB
     * @param mixed $entity
     * @return mixed
     */
    public function insert($entity)
    {
        parent::insert($entity);
        foreach($entity->getGroups() as $groupId) {
            $this->connection->query(
                "INSERT INTO `teacher_group` ".
                "(`teacher_id`, `group_id`)".
                "VALUES (".$entity->getId().", ".$groupId.")"
            );
        }
    }

    /**
     * Update exist entity data in the DB
     * @param mixed $entity
     * @return mixed
     */
    public function update($entity)
    {
        parent::update($entity);

        $this->connection->query(
            "DELETE FROM `teacher_group` WHERE `teacher_id` = ".$entity->getId()
        );
        foreach($entity->getGroups() as $groupId) {
            $this->connection->query(
                "INSERT INTO `teacher_group` ".
                "(`teacher_id`, `group_id`)".
                "VALUES (".$entity->getId().", ".$groupId.")"
            );
        }
    }
}