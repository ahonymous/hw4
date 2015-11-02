<?php

namespace Layer\Manager;

use Layer\Connector\Connector;

/**
 * Class AbstractManager
 * @package Layer\Manager
 */
class GrantManager implements ManagerInterface
{
    private $connector;
    public function __construct (Connector $connector){
        $this->connector = $connector;
    }

    /**
     * @param array $entity
     * @return bool
     */
    public function insert(array $entity)
    {
        $statement = $this->connector->connect()->prepare('INSERT INTO grants (
              granted,
              fund,
              project_id
            ) VALUES(
              :granted,
              :fund,
              :project_id
            )');
        $statement->bindValue(':granted', $entity['granted']);
        $statement->bindValue(':fund', $entity['fund']);
        $statement->bindValue(':project_id', $entity['project_id']);
        return $statement->execute();
    }

    /**
     * Update exist entity data in the DB
     * @param $entity
     * @return mixed
     */
    public function update($id, array $grant)
    {
        $request = "UPDATE grants SET granted = :granted,
          fund = :fund,
          project_id = :project_id
          WHERE id = :id"
        ;
        $statement = $this->connector->connect()->prepare($request);
        $statement->bindValue(':granted', $grant['granted']);
        $statement->bindValue(':fund', $grant['fund']);
        $statement->bindValue(':project_id', $grant['project_id']);
        $statement->bindValue(':id', $id);
        return $statement->execute();
    }

    /**
     * Delete entity data from the DB
     * @param $entity
     * @return mixed
     */
    public function remove($entity)
    {
        $statement = $this->connector->connect()->prepare("DELETE FROM grants WHERE id = :id");
        $statement->bindValue(':id', $entity);
        return $statement->execute();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $statement = $this->connector->connect()->prepare("SELECT * FROM grants WHERE id= :id");
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $this->generateStrForFetchedData($statement);
    }

    /**
     * @return array
     */
    public function findAll()
    {
        $statement = $this->connector->connect()->prepare("SELECT * FROM grants");
        $statement->execute();
        return $this->generateStrForFetchedData($statement);
    }

    /**
     * @param $statement
     * @return array
     */
    protected function generateStrForFetchedData ($statement)
    {
        $res = array();
        while ($tmpRecord = $statement->fetch()) {
            array_push($res, $tmpRecord);
        }
        $str = array();
        foreach ($res as $record) {
            $str[] = 'Запись№ '. $record['id'].
                '. Предоставленно: '. $record['granted'].
                '. Фонд: '. $record['fund'].
                '. Id проекта: '. $record['project_id']. '.';
        }
        return $str;
    }
}
