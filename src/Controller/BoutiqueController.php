<?php

namespace App\Controller;

use App\Repository\BoutiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/boutique")
 */
class BoutiqueController extends AbstractController
{
    /**
     * @Route("/", name="boutique-index")
     */
    public function index(BoutiqueRepository $boutiqueRepository)
    {
        return $this->render('boutique/index.html.twig', [
            'articles' => $boutiqueRepository->findAll()
        ]);
    }
}
