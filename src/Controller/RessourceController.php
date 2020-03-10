<?php

namespace App\Controller;

//use App\Entity\Ressource;
//use App\Form\RessourceType;
//use App\Repository\RessourceRepository;
use App\Repository\RessourceRepository;
use App\Service\TitreExercices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/design")
 */
class RessourceController extends AbstractController
{
    /**
     * @Route("/", name="design-index", methods={"GET"})
     */
    public function index(RessourceRepository $ressourceRepository)
    {
        return $this->render('ressource/index.html.twig',
            [
                'ressources' => $ressourceRepository->findAllDesignDateDesc(),
            ]
        );
    }

    /**
     * @Route("/detail/{id}", name="design-detail", methods={"GET"})
     */
    public function designDetail($id, RessourceRepository $ressourceRepository)
    {
        $ressource = $ressourceRepository->find($id);
        $dashCc = explode('-', $ressource->getCc());
        $dashEng = explode('-', $ressource->getEng());
        $dashSyn = explode('-', $ressource->getSyn());
        $dashAnc = explode('-', $ressource->getAnc());
        $dashDec = explode('-', $ressource->getDec());


        return $this->render('ressource/detail.html.twig',
            [
                'ressource' => $ressource,
                'titreDesign' =>ucfirst($ressource->getTitre()),
                'duree' =>$ressource->getDuree(),
                'groupe' =>$ressource->getGroupe(),
                'cc' =>TitreExercices::tableauTitresExercices($dashCc),
                'eng' =>TitreExercices::tableauTitresExercices($dashEng),
                'syn' =>TitreExercices::tableauTitresExercices($dashSyn),
                'anc' =>TitreExercices::tableauTitresExercices($dashAnc),
                'dec' =>TitreExercices::tableauTitresExercices($dashDec),
            ]
        );
    }
}
