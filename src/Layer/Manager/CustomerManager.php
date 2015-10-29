<?php
/**
 * Created by PhpStorm.
 * User: fumus
 * Date: 29.10.15
 * Time: 17:12
 */

namespace Layer\Manager;

use Entity\Customer as Customer;

class CustomerManager //extends AbstractManager
{
    private $connector;

    public function __construct(\PDO $connector)
    {
        $this->connector = $connector;
    }

    public function getAllCustomers($limit = 100, $offset = 0)
    {
        $statement = $this->connector->prepare('SELECT * FROM students LIMIT :limit OFFSET :offset');
        $statement->bindValue(':limit', (int) $limit, \PDO::PARAM_INT);
        $statement->bindValue(':offset', (int) $offset, \PDO::PARAM_INT);
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

    public function insert(Customer $customer)
    {
        $statement = $this->connector->prepare('INSERT INTO customers (first_name, last_name, email) VALUES(:firstName, :lastName, :email)');
        $statement->bindValue(':firstName', $customer->getFirstName());
        $statement->bindValue(':lastName', $customer->getLastName());
        $statement->bindValue(':email', $customer->getEmail());

        return $statement->execute();
    }


}