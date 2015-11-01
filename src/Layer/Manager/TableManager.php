<?php
/**
 * Created by PhpStorm.
 * User: fumus
 * Date: 01.11.15
 * Time: 13:22
 */

namespace Layer\Manager;


class TableManager
{
    public static function createTables(\PDO $db)
    {
        if (!self::tableExists($db, 'customers')) {
            try {
                $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);//Error Handling
                $sql = '
                CREATE TABLE IF NOT EXISTS `customers` (
                id INT AUTO_INCREMENT PRIMARY KEY,
                first_name VARCHAR( 50 ) NOT NULL,
                last_name VARCHAR( 50 ) NOT NULL,
                email VARCHAR(50) NOT NULL,
                created_at DATE NOT NULL,
                updated_at DATE NOT NULL)';
                $statement = $db->prepare($sql);
                $statement->execute();


            } catch (\PDOException $e) {
                echo $e->getMessage();

            }
        }

        if (!self::tableExists($db, 'books')) {
            try {
                $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);//Error Handling
                $sql = '
                CREATE TABLE IF NOT EXISTS `books` (
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR( 50 ) NOT NULL,
                isbn VARCHAR( 13 ) NOT NULL,
                author VARCHAR(50) NOT NULL,
                publishing_house VARCHAR(50) NOT NULL,
                price FLOAT NOT NULL,
                created_at DATE NOT NULL,
                updated_at DATE NOT NULL)';

                $statement = $db->prepare($sql);
                $statement->execute();


            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }

        if (!self::tableExists($db, 'purchases')) {
            try {
                $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);//Error Handling
                $sql = '
                CREATE TABLE IF NOT EXISTS `purchases` (
                id INT AUTO_INCREMENT PRIMARY KEY,
                customer_id INT NOT NULL,
                book_id INT NOT NULL,
                date DATE NOT NULL)';

                $statement = $db->prepare($sql);
                $statement->execute();

            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }

        return true;
    }

    public static function tableExists(\PDO $db, $tableName)
    {
        $tableExists = $db->query("SHOW TABLES LIKE '{$tableName}'")->rowCount() > 0;

        return $tableExists;
    }

}
