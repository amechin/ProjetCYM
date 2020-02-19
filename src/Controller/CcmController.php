<?php

namespace App\Controller;

use App\Repository\CCMRepository;
use App\Repository\FooterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ccm")
 */
class CcmController extends AbstractController
{
    /**
     * @Route("/", name="ccm-index")
     */
    public function index(CCMRepository $CCMRepository, FooterRepository $footerRepository)
    {
        return $this->render('ccm/index.html.twig', [
            'articles' => $CCMRepository->findAll(),
            'footer' => $footerRepository->findOneBy(['page' => 'ccm'])
        ]);
    }
}
