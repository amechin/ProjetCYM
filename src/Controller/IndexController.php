<?php

namespace App\Controller;

use App\Repository\FooterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Racine du site
 * @Route("/")
 */
class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(FooterRepository $footerRepository)
    {
        return $this->render('index/index.html.twig',
            [
                'footer' => $footerRepository->findOneBy(['page' => 'accueil'])
            ]);
    }
}
