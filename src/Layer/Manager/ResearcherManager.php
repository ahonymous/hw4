<?php

namespace Layer\Manager;

use Layer\Connector\Connector;

/**
 * Class AbstractManager
 * @package Layer\Manager
 */
class ResearcherManager implements ManagerInterface
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
        try {
            $statement = $this->connector->connect()->prepare('INSERT INTO researchers (
              full_name,
              experience,
              degree,
              nationality_id
            ) VALUES(
              :full_name,
              :experience,
              :degree,
              :nationality_id
            )');
            $statement->bindValue(':full_name', $entity['full_name']);
            $statement->bindValue(':experience', $entity['experience']);
            $statement->bindValue(':degree', $entity['degree']);
            $statement->bindValue(':nationality_id', $entity['nationality_id']);
            return $statement->execute();
        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    /**
     * Update exist entity data in the DB
     * @param $entity
     * @return mixed
     */
    public function update($id, array $researcher)
    {
        $request = "UPDATE researchers SET full_name = :full_name,
          experience = :experience,
          degree = :degree,
          nationality_id = :nationality_id
          WHERE id = :id"
        ;
        $statement = $this->connector->connect()->prepare($request);
        $statement->bindValue(':full_name', $researcher['full_name']);
        $statement->bindValue(':experience', $researcher['experience']);
        $statement->bindValue(':degree', $researcher['degree']);
        $statement->bindValue(':nationality_id', $researcher['nationality_id']);
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
        try {
            $statement = $this->connector->connect()->prepare("DELETE FROM researchers WHERE id = :id");
            $statement->bindValue(':id', $entity);
            return $statement->execute();
        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $statement = $this->connector->connect()->prepare("SELECT * FROM researchers WHERE id= :id");
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $this->generateStrForFetchedData($statement);
    }

    /**
     * @return array
     */
    public function findAll()
    {
        $statement = $this->connector->connect()->prepare("SELECT * FROM researchers");
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
                '. ФИО: '. $record['full_name'].
                '. Стаж: '. $record['experience'].
                '. Степень: '. $record['degree'].
                '. Код национальности: '. $record['nationality_id']. '.';
        }
        return $str;
    }
}
