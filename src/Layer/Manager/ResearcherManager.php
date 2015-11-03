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

    public function __construct(Connector $connector)
    {
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
            print "Error!: ".$e->getMessage()."<br/>";
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
          WHERE id = :id";
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
            print "Error!: ".$e->getMessage()."<br/>";
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
     * @param $param
     * @return array
     */

    public function findAll($param)
    {
        switch ($param) {
            case 'all':
                $statement = $this->connector->connect()->prepare("SELECT * FROM researchers");
                $statement->execute();

                return $this->generateStrForFetchedData($statement);

            case 'left':
                $request = "SELECT r.id, r.full_name, n.nationality AS n_name ".
                    "FROM nationalities n ".
                    "LEFT JOIN researchers r ON n.id = r.nationality_id";
                $statement = $this->connector->connect()->prepare($request);
                $statement->execute();

                return $statement->fetchAll();

            case 'right':
                $request = "SELECT r.id, r.full_name, n.nationality AS n_name ".
                    "FROM nationalities n ".
                    "RIGHT JOIN researchers r ON n.id = r.nationality_id";
                $statement = $this->connector->connect()->prepare($request);
                $statement->execute();

                return $statement->fetchAll();

            case 'inner':
                $request = "SELECT r.id, r.full_name, n.nationality AS n_name ".
                    "FROM nationalities n ".
                    "INNER JOIN researchers r ON n.id = r.nationality_id";
                $statement = $this->connector->connect()->prepare($request);
                $statement->execute();

                return $statement->fetchAll();

            case 'left with exception':
                $request = "SELECT r.id, r.full_name, n.nationality AS n_name ".
                    "FROM nationalities n ".
                    "INNER JOIN researchers r ON n.id = r.nationality_id ".
                    "WHERE r.id IS NULL";
                $statement = $this->connector->connect()->prepare($request);
                $statement->execute();
                var_dump($statement->fetchAll());

                return $statement->fetchAll();

            default:
                return $res = array('ERROR: wrong request');
        }
    }

    /**
     * @param $statement
     * @return array
     */
    protected function generateStrForFetchedData($statement)
    {
        $res = array();
        while ($tmpRecord = $statement->fetch()) {
            array_push($res, $tmpRecord);
        }
        $str = array();
        foreach ($res as $record) {
            $str[] = 'Запись№ '.$record['id'].
                '. ФИО: '.$record['full_name'].
                '. Стаж: '.$record['experience'].
                '. Степень: '.$record['degree'].
                '. Код национальности: '.$record['nationality_id'].'.';
        }

        return $str;
    }
}
