<?php
/**
 * Created by PhpStorm.
 * User: fumus
 * Date: 30.10.15
 * Time: 0:23
 */

namespace Controllers;

use Layer\Manager\CustomerManager;

class CustomersController
{
    private $manager;
    private $loader;
    private $twig;

    public function __construct($connector)
    {
        $this->manager = new CustomerManager($connector);
        $this->loader = new \Twig_Loader_Filesystem('../src/Views/templates/');
        $this->twig = new \Twig_Environment($this->loader, array(
            'cache' => false,
        ));
    }

    public function indexAction()
    {
        $customersData = $this->manager->findAll();
        return $this->twig->render('customers.html.twig', ['customers' => $customersData]);
    }
}