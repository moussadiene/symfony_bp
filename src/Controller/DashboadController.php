<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboadController extends AbstractController
{
    /**
     * @Route("/", name="dashboad")
     */
    public function index()
    {
        return $this->render('dashboad/index.html.twig', [
            'controller_name' => 'DashboadController',
        ]);
    }
}
