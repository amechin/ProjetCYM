<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @IsGranted("ROLE_ADMIN")
 * @Route("/admin")
 */
class AdminIndexController extends AbstractController
{
    /**
     * @Route("/index", name="admin-index")
     */
    public function index()
    {
        return $this->render('admin_index/index.html.twig');
    }
}
