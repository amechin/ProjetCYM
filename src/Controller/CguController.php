<?php

namespace App\Controller;

use App\Repository\CguRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CguController extends AbstractController
{
    /**
     * @Route("/cgu", name="cgu-index")
     */
    public function index(CguRepository $cguRepository)
    {
        return $this->render('cgu/index.html.twig',
            [
                'articles' => $cguRepository->findAll()
            ]);
    }
}
