<?php

namespace App\Controller;

use App\Entity\Correspondance;
use App\Form\CorrespondanceType;
use App\Repository\CorrespondanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/correspondance")
 */
class CorrespondanceController extends AbstractController
{
    /**
     * @Route("/", name="correspondance_index", methods={"GET"})
     */
    public function index(CorrespondanceRepository $correspondanceRepository): Response
    {
        return $this->render('correspondance/index.html.twig', [
            'correspondances' => $correspondanceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="correspondance_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $correspondance = new Correspondance();
        $form = $this->createForm(CorrespondanceType::class, $correspondance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($correspondance);
            $entityManager->flush();

            return $this->redirectToRoute('correspondance_index');
        }

        return $this->render('correspondance/new.html.twig', [
            'correspondance' => $correspondance,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="correspondance_show", methods={"GET"})
     */
    public function show(Correspondance $correspondance): Response
    {
        return $this->render('correspondance/show.html.twig', [
            'correspondance' => $correspondance,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="correspondance_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Correspondance $correspondance): Response
    {
        $form = $this->createForm(CorrespondanceType::class, $correspondance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('correspondance_index');
        }

        return $this->render('correspondance/edit.html.twig', [
            'correspondance' => $correspondance,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="correspondance_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Correspondance $correspondance): Response
    {
        if ($this->isCsrfTokenValid('delete'.$correspondance->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($correspondance);
            $entityManager->flush();
        }

        return $this->redirectToRoute('correspondance_index');
    }
}
