<?php
/**
 * Created by PhpStorm.
 * User: fumus
 * Date: 30.10.15
 * Time: 20:11
 */

namespace Controllers;

use Entity\Book;
use Layer\Manager\BookManager;

class BooksController
{
    private $manager;
    private $loader;
    private $twig;

    public function __construct($connector)
    {
        $this->manager = new BookManager($connector);
        $this->loader = new \Twig_Loader_Filesystem('../src/Views/templates/');
        $this->twig = new \Twig_Environment($this->loader, array(
            'cache' => false,
        ));
    }

    public function indexAction()
    {
        $booksData = $this->manager->findAll();
        return $this->twig->render('books.html.twig', ['books' => $booksData]);
    }

    public function newAction()
    {
        if (isset($_POST['title'])) {

            $book = new Book();
            $book->setTitle($_POST['title']);
            $book->setAuthor($_POST['author']);
            $book->setIsbn($_POST['isbn']);
            $book->setPublishingHouse($_POST['publishing_house']);
            $book->setPrice($_POST['price']);

            $this->manager->insert($book);

            return $this->indexAction();
        }
        return $this->twig->render('books_form.html.twig',
            [
                'title' => '',
                'author' => '',
                'isbn' => '',
                'publishing_house' => '',
                'price' => '',
            ]
        );
    }

    public function editAction()
    {
        if (isset($_POST['title'])) {
            $book = new Book();
            $book->setTitle($_POST['title']);
            $book->setAuthor($_POST['author']);
            $book->setIsbn($_POST['isbn']);
            $book->setPublishingHouse($_POST['publishing_house']);
            $book->setPrice($_POST['price']);

            $this->manager->update((int)$_GET['id'], $book);

            return $this->indexAction();
        }
        $booksData = $this->manager->find((int)$_GET['id'])[0];

        return $this->twig->render('books_edit.html.twig',
            [
                'title' => $booksData['title'],
                'author' => $booksData['author'],
                'isbn' => $booksData['isbn'],
                'publishing_house' => $booksData['publishingHouse'],
                'price' => $booksData['price'],
                'id' => $_GET['id']
            ]
        );
    }

    public function deleteAction()
    {
        if (isset($_POST['id'])) {
            $this->manager->remove((int)$_POST['id']);
            return $this->indexAction();
        }
        $booksData = $this->manager->find((int)$_GET['id'])[0];
        return $this->twig->render('books_delete.html.twig',
            [
                'title' => $booksData['title'],
                'author' => $booksData['author'],
                'book_id' => $_GET['id']
            ]
        );
    }
}