<?php

namespace Product;

use Entity\EntityTrait;

class Product
{

    use EntityTrait;

    private $id;

    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $price;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $productName
     */
    public function setName($productName)
    {
        $this->name = $productName;
    }

}