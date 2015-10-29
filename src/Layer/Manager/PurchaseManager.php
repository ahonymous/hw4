<?php
/**
 * Created by PhpStorm.
 * User: fumus
 * Date: 29.10.15
 * Time: 21:01
 */

namespace Layer\Manager;


class PurchaseManager
{
    private $connector;

    /**
     * PurchaseManager constructor.
     * Initializes database connection with sql server
     * @param $connector
     */
    public function __construct(\PDO $connector)
    {
        $this->connector = $connector;
    }

    public function getAllPurchases($limit = 100, $offset = 0)
    {
        $statement = $this->connector->prepare('
            SELECT * FROM purchases
            JOIN customers ON purchases.customer_id = customers.id
            JOIN books ON purchases.book_id = books.id
            LIMIT :limit OFFSET :offset
        ');
        $statement->bindValue(':limit', (int) $limit, \PDO::PARAM_INT);
        $statement->bindValue(':offset', (int) $offset, \PDO::PARAM_INT);
        $statement->execute();
        return $this->fetchPurchaseData($statement);
    }

    private function fetchPurchaseData(\PDOStatement $statement)
    {
        $results = [];
        while ($result = $statement->fetch()) {
            $results[] = [
                'id' => $result['id'],
                'firstName' => $result['first_name'],
                'lastName' => $result['last_name'],
                'email' => $result['email'],
                'title' => $result['title'],
                'isbn' => $result['isbn'],
                'author' => $result['author'],
                'date' => $result['date'],
                'price' => $result['price'],
            ];
        }
        return $results;
    }
}
