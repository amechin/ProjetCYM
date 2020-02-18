<?php

namespace App\Controller;

use App\Entity\Duree;
use App\Form\Duree1Type;
use App\Repository\DureeRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @IsGranted("ROLE_ADMIN")
 * @Route("/admin/duree")
 */
class DureeController extends AbstractController
{
    /**
     * @Route("/", name="duree_index", methods={"GET"})
     */
    public function index(DureeRepository $dureeRepository): Response
    {
        return $this->render('duree/index.html.twig', [
            'durees' => $dureeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="duree_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $duree = new Duree();
        $form = $this->createForm(Duree1Type::class, $duree);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($duree);
            $entityManager->flush();

            return $this->redirectToRoute('duree_index');
        }

        return $this->render('duree/new.html.twig', [
            'duree' => $duree,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="duree_show", methods={"GET"})
     */
    public function show(Duree $duree): Response
    {
        return $this->render('duree/show.html.twig', [
            'duree' => $duree,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="duree_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Duree $duree): Response
    {
        $form = $this->createForm(Duree1Type::class, $duree);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('duree_index');
        }

        return $this->render('duree/edit.html.twig', [
            'duree' => $duree,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="duree_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Duree $duree): Response
    {
        if ($this->isCsrfTokenValid('delete'.$duree->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($duree);
            $entityManager->flush();
        }

        return $this->redirectToRoute('duree_index');
    }
}
