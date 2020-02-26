<?php

namespace App\Controller;

use App\Repository\CCMRepository;
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
    public function index(CCMRepository $CCMRepository)
    {
        return $this->render('ccm/index.html.twig', [
            'articles' => $CCMRepository->findAll()
        ]);
    }
}
