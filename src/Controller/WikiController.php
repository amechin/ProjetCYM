<?php

namespace App\Controller;

use App\Repository\FooterRepository;
use App\Repository\WikiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ressources")
 */
class WikiController extends AbstractController
{
    /**
     * @Route("/", name="wiki-index")
     */
    public function index(WikiRepository $wikiRepository, FooterRepository $footerRepository)
    {
        return $this->render('wiki/index.html.twig', [
            'articles' => $wikiRepository->findAll()
        ]);
    }
}
