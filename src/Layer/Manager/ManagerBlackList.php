<?php

namespace Layer\Manager;


class ManagerBlackList extends Manager{
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
        $idTelephone = $entity->getIdTelephone();
        $idPeople= $entity->getIdPeople();
        $sth = $this->dbh->prepare('INSERT INTO BlackList (id_telephone, id_people) VALUES (:id_telephone,:id_people)');
        return $sth->execute(array(':id_telephone' => $idTelephone, ':id_people' => $idPeople));
    }

    /**
     * @param $entity
     * @return mixed
     */
    public function update($entity)
    {
        $idTelephone = $entity->getIdTelephone();
        $idPeople= $entity->getIdPeople();
        $sth = $this->dbh->prepare('UPDATE BlackList SET id_telephone = :id_telephone WHERE id_people = :id_people');
        return $sth->execute(array(':id_telephone' => $idTelephone,
                                    ':id_people' => $idPeople));
    }

    /**
     * @param $entity
     * @return mixed
     */
    public function remove($entity)
    {
        $idTelephone = $entity->getIdTelephone();
        $sth = $this->dbh->prepare('DELETE FROM BlackList WHERE id_telephone = :id_telephone');
        return $sth->execute(array(':id_telephone' => $idTelephone));
    }

    /**
     * @param $entityName
     * @param $id
     * @return array
     */
    public function find($entityName, $id)
    {
        if ($entityName == 'BlackList')
        {
            $sth = $this->dbh->prepare('SELECT * FROM BlackList WHERE id_telephone = :id_telephone');
            $sth->execute(array(':id_telephone' => $id));
            return $resalt = $sth->fetch(\PDO::FETCH_ASSOC);
        }
    }

    /**
     * @param $entityName
     * @return mixed
     */
    public function findAll($entityName)
    {
        if ($entityName == 'BlackList')
        {
            $sth = $this->dbh->prepare('SELECT * FROM BlackList');
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
        if($entityName == 'BlackList')
        {
            $sth = $this->dbh->prepare("SELECT $param1, $param2 FROM BlackList");
            $sth->execute();
            return $resalt = $sth->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

}