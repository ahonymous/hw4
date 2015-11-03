<?php

namespace Layer\Manager;

use Layer\Connector\Connector;

/**
 * Class AbstractManager
 * @package Layer\Manager
 */
class ProjectManager implements ManagerInterface
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
        $statement = $this->connector->connect()->prepare('INSERT INTO projects (
              project_name,
              execution_time,
              field
            ) VALUES(
              :project_name,
              :execution_time,
              :field
            )');
        $statement->bindValue(':project_name', $entity['project_name']);
        $statement->bindValue(':execution_time', $entity['execution_time']);
        $statement->bindValue(':field', $entity['field']);

        return $statement->execute();
    }

    /**
     * Update exist entity data in the DB
     * @param $entity
     * @return mixed
     */
    public function update($id, array $project)
    {
        $request = "UPDATE projects SET project_name = :project_name,
          execution_time = :execution_time,
          field = :field
          WHERE id = :id";
        $statement = $this->connector->connect()->prepare($request);
        $statement->bindValue(':project_name', $project['project_name']);
        $statement->bindValue(':execution_time', $project['execution_time']);
        $statement->bindValue(':field', $project['field']);
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
        $statement = $this->connector->connect()->prepare("DELETE FROM projects WHERE id = :id");
        $statement->bindValue(':id', $entity);

        return $statement->execute();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $statement = $this->connector->connect()->prepare("SELECT * FROM projects WHERE id= :id");
        $statement->bindValue(':id', $id);
        $statement->execute();

        return $this->generateStrForFetchedData($statement);
    }

    /**
     * @return array
     */
    public function findAll()
    {
        $statement = $this->connector->connect()->prepare("SELECT * FROM projects");
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
                '. Тема: '.$record['project_name'].
                '. Выполнение: '.$record['execution_time'].
                '. Область: '.$record['field'].'.';
        }

        return $str;
    }
}
