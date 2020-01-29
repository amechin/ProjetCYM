<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index()
    {

//        return $this->redirectToRoute('default');
//        return $this->redirect('http://www.google.fr');
//        $persons = ['Adrien', 'Marie', 'La mif'];
//        $persons = $this->getDoctrine()->getRepository(User::class)->findAll();
        $cats = $this->getDoctrine()->getRepository(Categorie::class)->findAll();

//        $entityManager = $this->getDoctrine()->getManager();
//        $user1 = new User();
//        $user1->setName('Adam');
//
//        $user2 = new User();
//        $user2->setName('Robert');
//
//        $user3 = new User();
//        $user3->setName('John');
//
//        $user4 = new User();
//        $user4->setName('Susan');
//
//        $entityManager->persist($user1);
//        $entityManager->persist($user2);
//        $entityManager->persist($user3);
//        $entityManager->persist($user4);
//        $entityManager->flush();
        return $this->render('test/index.html.twig',
            [
                'categories' => $cats,
            ]);
    }

    /**
     * @Route("/default", name="default")
     */
    public function default()
    {
        return new Response('I am from default2 route');
    }

}
