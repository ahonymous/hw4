<?php

namespace Layer\Manager;

use Layer\Connector\Connector;

/**
 * Class AbstractManager
 * @package Layer\Manager
 */
class NationalityManager implements ManagerInterface
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
        $statement = $this->connector->connect()->prepare('INSERT INTO nationalities (
              nationality
            ) VALUES(
              :nationality
            )');
        $statement->bindValue(':nationality', $entity['nationality']);

        return $statement->execute();
    }

    /**
     * Update exist entity data in the DB
     * @param $entity
     * @return mixed
     */
    public function update($id, array $nationality)
    {
        $request = "UPDATE nationalities SET nationality = :nationality WHERE id = :id";
        $statement = $this->connector->connect()->prepare($request);
        $statement->bindValue(':nationality', $nationality['nationality']);
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
            $statement = $this->connector->connect()->prepare("DELETE FROM nationalities WHERE id = :id");
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
        $statement = $this->connector->connect()->prepare("SELECT * FROM nationalities WHERE id= :id");
        $statement->bindValue(':id', $id);
        $statement->execute();

        return $this->generateStrForFetchedData($statement);
    }

    /**
     * @return array
     */
    public function findAll()
    {
        $statement = $this->connector->connect()->prepare("SELECT * FROM nationalities");
        $statement->execute();

        return $this->generateStrForFetchedData($statement);
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
                '. Национальность: '.$record['nationality'].'.';
        }

        return $str;
    }
}
