<?php

namespace Layer\Manager;


class ManagerPeoples extends Manager{
    private $dbh;
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }
    public function insert($entity)
    {
        $firstname = $entity->getFirstName();
        $lastname = $entity->getSecondName();
        $sth = $this->dbh->prepare('INSERT INTO Peoples (firstname, lastname) VALUES (:firstname,:lastname)');
        return $sth->execute(array(':firstname' => $firstname, ':lastname' => $lastname));
    }

    public function update($entity)
    {
        $sth = $this->dbh->prepare('UPDATE Peoples SET firstname = :firstname WHERE id=1');
        return $sth->execute(array(':firstname' => 'Natasha'));
    }

    public function remove($entity)
    {
        $sth = $this->dbh->prepare('DELETE FROM Peoples WHERE firstname = :firstname');
        return $sth->execute(array(':firstname' => 'Natalia'));
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
            $sth = $this->dbh->prepare('SELECT firstname FROM Peoples WHERE id = :id');
            $sth->execute(array(':id' => $id));
            return $resalt = $sth->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
    public function findAll($entityName)
    {
        if ($entityName == 'Peoples')
        {
            $sth = $this->dbh->prepare('SELECT * FROM Peoples');
            $sth->execute();
            return $resalt = $sth->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function findBy($entityName, $criteria = [])
    {
        $param1 = $criteria[0];
        $param2 = $criteria[1];
        if($entityName == 'Peoples')
        {
            $sth = $this->dbh->prepare("SELECT $param1, $param2 FROM Peoples");
            $sth->execute(/*array(':param1' => $param1, 'param2' => $param2)*/);
            return $resalt = $sth->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

}