<?php
/**
 * Created by PhpStorm.
 * User: fumus
 * Date: 05.11.15
 * Time: 1:16
 */

namespace Tests;


class FilesExistTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider filesProvider
     * @param $pathToFile
     */
    public function testFiles($pathToFile)
    {
        $this->assertFileExists($pathToFile);
    }

    public function filesProvider()
    {

        return [
            ['src/Entity/AbstractProduct.php'],
            ['src/Entity/Book.php'],
            ['src/Entity/Customer.php'],
            ['src/Entity/EntityTrait.php'],
            ['src/Layer/Connector/ConnectorInterface.php'],
            ['src/Layer/Connector/DataBaseConnector.php'],
            ['src/Layer/Manager/AbstractManager.php'],
            ['src/Layer/Manager/BookManager.php'],
            ['src/Layer/Manager/CustomerManager.php'],
            ['src/Layer/Manager/ManagerInterface.php'],
            ['src/Layer/Manager/PurchaseManager.php'],
            ['src/Layer/Manager/TableManager.php'],
            ['config/autoload.php'],
            ['src/Controllers/BooksController.php'],
            ['src/Controllers/CustomersController.php'],
            ['src/Controllers/PurchaseController.php'],
            ['web/index.php'],
            ['src/Views/templates/books.html.twig'],
            ['src/Views/templates/books_delete.html.twig'],
            ['src/Views/templates/books_edit.html.twig'],
            ['src/Views/templates/books_form.html.twig'],
            ['src/Views/templates/customers.html.twig'],
            ['src/Views/templates/customer_edit.html.twig'],
            ['src/Views/templates/customers_delete.html.twig'],
            ['src/Views/templates/purchases.html.twig']

        ];
    }
}
