<?php

namespace Layer\Manager;


class ManagerTelephone extends Manager{
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
        $brand = $entity->getBrand();
        $model = $entity->getModel();
        $typeDev = $entity->getType();
        $numberPhone = $entity->getNumberPhone();
        $imai = $entity->getImei();
        $sth = $this->dbh->prepare('INSERT INTO Telephones (brand, model, typeDev, numberPhone, imai) VALUES (:brand, :model, :typeDev, :numberPhone, :imai)');
        return $sth->execute(array( ':brand' => $brand,
                                    ':model' => $model,
                                    ':typeDev' => $typeDev,
                                    ':numberPhone' => $numberPhone,
                                    ':imai' => $imai,
                                    )
                            );
    }

    /**
     * @param $entity
     * @return mixed
     */
    public function update($entity)
    {
        $brand = $entity->getBrand();
        $model = $entity->getModel();
        $typeDev = $entity->getType();
        $numberPhone = $entity->getNumberPhone();
        $imai = $entity->getImei();
        $sth = $this->dbh->prepare('UPDATE Telephones SET numberPhone = :numberPhone, imai = :imai, brand = :brand, model = :model, typeDev = :typeDev
                                    WHERE imai = :imai');
        return $sth->execute(array( ':brand' => $brand,
                                    ':model' => $model,
                                    ':typeDev' => $typeDev,
                                    ':numberPhone' => $numberPhone,
                                    ':imai' => $imai,));
    }

    /**
     * @param $entity
     * @return mixed
     */
    public function remove($entity)
    {
        $imai = $entity->getImei();
        $sth = $this->dbh->prepare('DELETE FROM Telephones WHERE imai = :imai');
        return $sth->execute(array(':imai' => $imai));
    }

    /**
     * @param $entityName
     * @param $id
     * @return array
     */
    public function find($entityName, $id)
    {
        if ($entityName == 'Telephones')
        {
            $sth = $this->dbh->prepare('SELECT * FROM Telephones WHERE imai = :imai');
            $sth->execute(array(':imai' => $id));
            return $resalt = $sth->fetch(\PDO::FETCH_ASSOC);
        }
    }

    /**
     * @param $entityName
     * @return mixed
     */
    public function findAll($entityName)
    {
        if ($entityName == 'Telephones')
        {
            $sth = $this->dbh->prepare('SELECT * FROM Telephones');
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
        if($entityName == 'Telephones')
        {
            $sth = $this->dbh->prepare("SELECT $param1, $param2 FROM Telephones");
            $sth->execute();
            return $resalt = $sth->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

}