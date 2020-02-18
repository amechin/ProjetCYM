<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Contact;
use App\Entity\Correspondance;
use App\Form\ContactType;
use App\Form\ParamType;
use App\Service\SupprimerDoublons;
use App\Service\TitreExercices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * @Route("/reunion")
 */
class ArbreController extends AbstractController
{
    /**
     * @Route("/", name="reunion-parametres")
     */
    public function Parametres(SessionInterface $session, Request $request)
    {
        $session->set('cat', '');
        $session->set('synthese', '');

        $form = $this->createForm(ParamType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $duree = $data['duree'];
            $groupe = $data['groupe'];

            return $this->redirectToRoute('reunion-creer-champ', [
                'duree' => $duree->getId(),
                'groupe' => $groupe->getId()
            ]);
        }

        return $this->render('arbre/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/cc/{duree}/{groupe}/{carte}", name="reunion-creer-champ")
     */
    public function creerLeChamp(Request $request, int $duree, int $groupe, int $carte = null)
    {
        $catSelect = "Créer le champ";
        $catSelectId = 1;
        $exercices = null;
        $dataExercices = null;

        if ($request->query->get('exo') != null) {
            $session = $request->getSession();
            $exo = $request->query->get('exo');
            $cat = $request->query->get('catId');

            $titre = TitreExercices::unTitre($exo);

            $tab_temp = [
                $cat => [
                    $exo => $titre
                ]
            ];

            $synthese = $session->get('synthese');
            if (!is_array($synthese)) {
                $synthese = [];
            }

            if (!in_array($synthese, $tab_temp)) {
                array_push($synthese, $tab_temp);
                $session->set('synthese', $synthese);
                $this->addFlash('notice', 'Vous venez d\'ajouter un exercice, vous pouvez poursuivre votre Design');
            }
        }

        $em = $this->getDoctrine()->getManager();

        $cartes = $em->getRepository(Correspondance::class)->findByCartes($duree, $groupe, $catSelectId);
        $cartes = SupprimerDoublons::unique($cartes);

        $categories = $em->getRepository(Categorie::class)->findAll();

        if (null != $carte) {
            $exercices = $em->getRepository(Correspondance::class)
                ->findByExercices($duree, $groupe, $catSelectId, $carte);
            $dataExercices = TitreExercices::titreExercices($exercices);
        }

        return $this->render('arbre/creerChamp.html.twig',
            [
                'duree' => $duree,
                'groupe' => $groupe,
                'cartes' => $cartes,
                'carte' => $carte,
                'categories' => $categories,
                'catSelect' => $catSelect,
                'catSelectId' => $catSelectId,
                'exercices' => $dataExercices
            ]);
    }

    /**
     * @Route("/synthese", name="reunion-synthese")
     */
    public function synthese(Request $request)
    {
        $session = $request->getSession();
        $synthese = $session->get('synthese');

        return $this->render('arbre/synthese.html.twig',
            [
                'exercices' => $synthese,
            ]);
    }

    /**
     * @Route("/send", name="synthese-send", methods={"GET","POST"})
     */
    public function mail(Request $request, \Swift_Mailer $mailer)
    {
        $session = $request->getSession();
        $synthese = $session->get('synthese');

        $message = (new \Swift_Message(
            'Vous avez un nouveau message'))
            ->setFrom('cook@labocollectif.fr')
            ->setTo('cook@labocollectif.fr')
            ->setBody($this->renderView(
                'arbre/mail/notification-synthese.html.twig',
                [
                    'exercices' => $synthese,
                ]),
                'text/html');;
        $mailer->send($message);

        return $this->render('arbre/mail/design-sent.html.twig');
    }

}