<?php
/**
 * Created by PhpStorm.
 * User: fumus
 * Date: 29.10.15
 * Time: 17:12
 */

namespace Layer\Manager;


class CustomerManager extends AbstractManager
{
    private $connector;

    public function __construct(\PDO $connector)
    {
        $this->connector = $connector;
    }

    public function findAll($limit = 100, $offset = 0)
    {
        $statement = $this->connector->prepare('SELECT * FROM customers LIMIT :limit OFFSET :offset');
        $statement->bindValue(':limit', (int)$limit, \PDO::PARAM_INT);
        $statement->bindValue(':offset', (int)$offset, \PDO::PARAM_INT);
        $statement->execute();

        return $this->fetchCustomerData($statement);

    }

    private function fetchCustomerData(\PDOStatement $statement)
    {
        $results = [];
        while ($result = $statement->fetch()) {
            $results[] = [
                'id' => $result['id'],
                'firstName' => $result['first_name'],
                'lastName' => $result['last_name'],
                'email' => $result['email'],
            ];
        }
        return $results;
    }

    public function insert($entity)
    {
        $statement = $this->connector->prepare('INSERT INTO customers (first_name, last_name, email) VALUES(:firstName, :lastName, :email)');
        $statement->bindValue(':firstName', $entity->getFirstName());
        $statement->bindValue(':lastName', $entity->getLastName());
        $statement->bindValue(':email', $entity->getEmail());

        return $statement->execute();
    }

    public function find($id)
    {
        $statement = $this->connector->prepare('SELECT * FROM customers WHERE id = :id LIMIT 1');
        $statement->bindValue(':id', (int)$id, \PDO::PARAM_INT);
        $statement->execute();
        return $this->fetchCustomerData($statement);

    }

    public function update($id, $entity)
    {
        $statement = $this->connector->prepare('UPDATE customers SET first_name = :firstName, last_name = :lastName, email = :email WHERE id = :id');
        $statement->bindValue(':firstName', $entity->getFirstName(), \PDO::PARAM_STR);
        $statement->bindValue(':lastName', $entity->getLastName(), \PDO::PARAM_STR);
        $statement->bindValue(':email', $entity->getEmail(), \PDO::PARAM_STR);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);

        return $statement->execute();
    }

    public function remove($id)
    {
        $statement = $this->connector->prepare('DELETE FROM customers WHERE id = :id');
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        return $statement->execute();
    }


}