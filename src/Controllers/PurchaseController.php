<?php
/**
 * Created by PhpStorm.
 * User: fumus
 * Date: 29.10.15
 * Time: 22:06
 */

namespace Controllers;

use Layer\Manager\PurchaseManager;

//use Views\Renderer;

class PurchaseController
{
    private $manager;
    private $loader;
    private $twig;

    public function __construct($connector)
    {
        $this->manager = new PurchaseManager($connector);
        $this->loader = new \Twig_Loader_Filesystem('../src/Views/templates/');
        $this->twig = new \Twig_Environment($this->loader, array(
            'cache' => false,
        ));
    }

    public function indexAction()
    {
        $resultsData = $this->manager->getAllPurchases();
        return $this->twig->render('purchases.html.twig', ['results' => $resultsData]);
    }
}