<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProjetFlashController extends AbstractController
{
    /**
     * @Route("/flash", name="projet_flash")
     */
    public function index()
    {
        return $this->render('projet_flash/index.html.twig',
            [
            ]);
    }
}
