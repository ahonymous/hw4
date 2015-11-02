<?php
/**
 * Created by PhpStorm.
 * User: fumus
 * Date: 30.10.15
 * Time: 18:14
 */

namespace Layer\Manager;


class BookManager extends AbstractManager
{
    private $connector;

    public function __construct(\PDO $connector)
    {
        $this->connector = $connector;
    }

    public function findAll($limit = 100, $offset = 0)
    {
        $statement = $this->connector->prepare('SELECT * FROM books LIMIT :limit OFFSET :offset');
        $statement->bindValue(':limit', (int)$limit, \PDO::PARAM_INT);
        $statement->bindValue(':offset', (int)$offset, \PDO::PARAM_INT);
        $statement->execute();

        return $this->fetchBookData($statement);

    }

    private function fetchBookData(\PDOStatement $statement)
    {
        $results = [];
        while ($result = $statement->fetch()) {
            $results[] = [
                'id' => $result['id'],
                'title' => $result['title'],
                'isbn' => $result['isbn'],
                'author' => $result['author'],
                'price' => $result['price'],
                'publishingHouse' => $result['publishing_house']
            ];
        }
        return $results;
    }

    public function insert($entity)
    {
        parent::insert($entity);

        $statement = $this->connector->prepare('INSERT INTO books (title, isbn, author, publishing_house, price, created_at) VALUES(:title, :isbn, :author, :publishingHouse, :price, :createdAt)');
        $statement->bindValue(':title', $entity->getTitle());
        $statement->bindValue(':isbn', $entity->getIsbn());
        $statement->bindValue(':author', $entity->getAuthor());
        $statement->bindValue(':publishingHouse', $entity->getPublishingHouse());
        $statement->bindValue(':price', $entity->getPrice());
        $statement->bindValue(':createdAt', $entity->getCreatedAt());

        return $statement->execute();
    }

    public function find($id)
    {
        $statement = $this->connector->prepare('SELECT * FROM books WHERE id = :id LIMIT 1');
        $statement->bindValue(':id', (int)$id, \PDO::PARAM_INT);
        $statement->execute();
        return $this->fetchBookData($statement);

    }

    public function update($id, $entity)
    {
        parent::update($id, $entity);

        $statement = $this->connector->prepare('UPDATE books SET title = :title, isbn = :isbn, author = :author, publishing_house = :publishingHouse, price = :price, updated_at = :updatedAt WHERE id = :id');
        $statement->bindValue(':title', $entity->getTitle());
        $statement->bindValue(':isbn', $entity->getIsbn());
        $statement->bindValue(':author', $entity->getAuthor());
        $statement->bindValue(':publishingHouse', $entity->getPublishingHouse());
        $statement->bindValue(':price', $entity->getPrice());
        $statement->bindValue(':updatedAt', $entity->getUpdatedAt());
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);

        return $statement->execute();
    }

    public function remove($id)
    {
        $statement = $this->connector->prepare('DELETE FROM books WHERE id = :id');
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        return $statement->execute();
    }
}
