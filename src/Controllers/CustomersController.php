<?php
/**
 * Created by PhpStorm.
 * User: fumus
 * Date: 30.10.15
 * Time: 0:23
 */

namespace Controllers;

use Entity\Customer;
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

    public function newAction()
    {
        if (isset($_POST['first_name'])) {
            $customer = new Customer($_POST['first_name'], $_POST['last_name'], $_POST['email']);
            $this->manager->insert($customer);

            return $this->indexAction();
        }
        return $this->twig->render('customers_form.html.twig',
            [
                'first_name' => '',
                'last_name' => '',
                'email' => '',
            ]
        );
    }

    public function editAction()
    {
        if (isset($_POST['first_name'])) {
            $customer = new Customer($_POST['first_name'], $_POST['last_name'], $_POST['email']);
            $this->manager->update((int) $_GET['id'], $customer);

            return $this->indexAction();
        }
        $customersData = $this->manager->find((int) $_GET['id'])[0];
        return $this->twig->render('customer_edit.html.twig',
            [
                'first_name' => $customersData['firstName'],
                'last_name' => $customersData['lastName'],
                'email' => $customersData['email'],
                'id' => $_GET['id']
            ]
        );
    }
}