<?php

namespace Layer\Manager;


class ManagerPeoples extends Manager{
    private $dbh;

    /**
     * @param $dbh
     */
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    /**
     * @param mixed $entity
     * @return mixed
     */
    public function insert($entity)
    {
        $firstName = $entity->getFirstName();
        $lastName = $entity->getSecondName();
        $sth = $this->dbh->prepare('INSERT INTO Peoples (firstname, lastname) VALUES (:firstname,:lastname)');
        return $sth->execute(array(':firstname' => $firstName, ':lastname' => $lastName));
    }

    /**
     * @param $entity
     * @return mixed
     */
    public function update($entity)
    {
        $firstName = $entity->getFirstName();
        $lastName = $entity->getSecondName();
        $sth = $this->dbh->prepare('UPDATE Peoples SET firstname = :firstname WHERE lastname = :lastname');
        return $sth->execute(array(':firstname' => $firstName,
                                    ':lastname' => $lastName));
    }

    /**
     * @param $entity
     * @return mixed
     */
    public function remove($entity)
    {
        $firstName = $entity->getFirstName();
        $sth = $this->dbh->prepare('DELETE FROM Peoples WHERE firstname = :firstname');
        return $sth->execute(array(':firstname' => $firstName));
    }

    /**
     * @param $entityName
     * @param $id
     * @return array
     */
    public function find($entityName, $id)
    {
        if ($entityName == 'Peoples')
        {
            $sth = $this->dbh->prepare('SELECT * FROM Peoples WHERE firstname = :firstname');
            $sth->execute(array(':firstname' => $id));
            return $resalt = $sth->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    /**
     * @param $entityName
     * @return mixed
     */
    public function findAll($entityName)
    {
        if ($entityName == 'Peoples')
        {
            $sth = $this->dbh->prepare('SELECT * FROM Peoples');
            $sth->execute();
            return $resalt = $sth->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    /**
     * @param $entityName
     * @param array $criteria
     * @return mixed
     */
    public function findBy($entityName, $criteria = [])
    {
        $param1 = $criteria[0];
        $param2 = $criteria[1];
        if($entityName == 'Peoples')
        {
            $sth = $this->dbh->prepare("SELECT $param1, $param2 FROM Peoples");
            $sth->execute();
            return $resalt = $sth->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

}