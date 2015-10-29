<?php
/**
 * Created by PhpStorm.
 * User: fumus
 * Date: 29.10.15
 * Time: 15:32
 */

namespace Entity;


abstract class AbstractProduct
{
    protected $title;
    protected $price;

    abstract public function getTitle();

    abstract public function setTitle($title);

    abstract public function getPrice();

    abstract public function setPrice($price);
}
