<?php
/**
 * Created by PhpStorm.
 * User: fumus
 * Date: 29.10.15
 * Time: 15:37
 */

namespace Entity;


class Book extends AbstractProduct
{
    protected $isbn;
    protected $author;
    protected $publishingHouse;

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    public function getIsbn()
    {
        return $this->isbn;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setPublishingHouse($publishingHouse)
    {
        $this->publishingHouse = $publishingHouse;
    }

    public function getPublishingHouse()
    {
        return $this->publishingHouse;
    }
}