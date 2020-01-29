<?php

namespace App\Controller;

use App\Entity\Produits;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProduitsController extends AbstractController
{
    /**
     * @Route("/produits", name="produits")
     */
    public function index()
    {
        $produits = $this->getDoctrine()->getRepository(Produits::class)->findAll();

        return $this->render('produits/index.html.twig',
        [
            'produits' => $produits,
        ]);
    }
}
