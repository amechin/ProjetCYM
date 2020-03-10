<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Contact;
use App\Entity\Correspondance;
use App\Entity\Ressource;
use App\Form\ContactType;
use App\Form\CorrespondanceType;
use App\Form\ParamType;
use App\Form\SyntheseType;
use App\Repository\CategorieRepository;
use App\Repository\CorrespondanceRepository;
use App\Repository\DureeRepository;
use App\Repository\FooterRepository;
use App\Repository\GroupeRepository;
use App\Repository\RessourceRepository;
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
    public function Parametres(SessionInterface $session, Request $request, FooterRepository $footerRepository)
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
                'footer' => $footerRepository->findOneBy(['page' => 'debut_design']),
                'duree' => $duree->getId(),
                'groupe' => $groupe->getId()
            ]);
        }

        return $this->render('arbre/index.html.twig', [
            'footer' => $footerRepository->findOneBy(['page' => 'debut_design']),
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/cc/{duree}/{groupe}/{carte}", name="reunion-creer-champ")
     */
    public function creerLeChamp(Request $request, int $duree, int $groupe, int $carte = null, CategorieRepository $cr)
    {
        $catSelect = $cr->find(1);
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
     * @Route("/en/{duree}/{groupe}/{carte}", name="reunion-engagement")
     */
    public function engagement(Request $request, int $duree, int $groupe, int $carte = null, CategorieRepository $cr)
    {
        $catSelect = $cr->find(2);
        $catSelectId = 2;
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

        return $this->render('arbre/engagement.html.twig',
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
     * @Route("/sy/{duree}/{groupe}/{carte}", name="reunion-synergie")
     */
    public function synergie(Request $request, int $duree, int $groupe, int $carte = null, CategorieRepository $cr)
    {
        $catSelect = $cr->find(3);;
        $catSelectId = 3;
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

        return $this->render('arbre/synergie.html.twig',
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
     * @Route("/an/{duree}/{groupe}/{carte}", name="reunion-ancrage")
     */
    public function ancrage(Request $request, int $duree, int $groupe, int $carte = null, CategorieRepository $cr)
    {
        $catSelect = $cr->find(4);;
        $catSelectId = 4;
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

        return $this->render('arbre/ancrage.html.twig',
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
     * @Route("/de/{duree}/{groupe}/{carte}", name="reunion-declusion")
     */
    public function declusion(Request $request, int $duree, int $groupe, int $carte = null, CategorieRepository $cr)
    {
        $catSelect = $cr->find(5);;
        $catSelectId = 5;
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

        return $this->render('arbre/declusion.html.twig',
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
    public function synthese(Request $request, DureeRepository $dureeRepository, GroupeRepository $groupeRepository, RessourceRepository $ressourceRepository,\Swift_Mailer $mailer)
    {
        $session = $request->getSession();
        $synthese = $session->get('synthese');
        $groupeId = $request->query->get('groupe');
        $dureeId = $request->query->get('duree');
        $creerChamp = null;
        $engagement=null;
        $synergie=null;
        $ancrage=null;
        $declusion=null;

        $form = $this->createForm(SyntheseType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //on met la synthese en base
            if(isset($synthese)){
                foreach ($synthese as $item){
                    foreach ($item as $sousCategorie => $exo){
                        foreach ($exo as $numeroExo => $value){
                            if($sousCategorie == 1)
                                $creerChamp .= $numeroExo . '-';
                            if($sousCategorie==2)
                                $engagement .= $numeroExo . '-';
                            if($sousCategorie == 3)
                                $synergie .= $numeroExo . '-';
                            if($sousCategorie==4)
                                $ancrage .= $numeroExo . '-';
                            if($sousCategorie==5)
                                $declusion .= $numeroExo . '-';
                        }
                    }
                }

                //on enleve le dernier charactere pour chaque ligne d'exercices
                $creerChamp = rtrim($creerChamp,'-');
                $engagement = rtrim($engagement,'-');
                $synergie = rtrim($synergie,'-');
                $ancrage = rtrim($ancrage,'-');
                $declusion = rtrim($declusion,'-');

                $groupe = $groupeRepository->find($groupeId);
                $duree= $dureeRepository->find($dureeId);
                $data=$form->getData();
                $titre = $data['titre'];
                $email = $data['email'];

                $ressource = new Ressource();
                $ressource->setTitre($titre);
                $ressource->setDuree($duree);
                $ressource->setGroupe($groupe);
                $ressource->setCc($creerChamp);
                $ressource->setEng($engagement);
                $ressource->setSyn($synergie);
                $ressource->setAnc($ancrage);
                $ressource->setDec($declusion);
                $ressource->setDesignId($ressourceRepository->findHighestDesignId()+1);

                $em = $this->getDoctrine()->getManager();
                $em->persist($ressource);
                $em->flush();

                //fin du isset(synthese)
            }

            $message = (new \Swift_Message(
                'Vous avez un nouveau message'))
                ->setFrom('cook@labocollectif.fr')
                ->setTo($email)
                ->setBody($this->renderView(
                    'arbre/mail/notification-synthese.html.twig',
                    [
                        'exercices' => $synthese,
                        'duree' => $dureeRepository->find($dureeId),
                        'groupe' => $groupeRepository->find($groupeId),
                        'titre' => $titre
                    ]),
                    'text/html');;
            $mailer->send($message);

            $messageAdmin = (new \Swift_Message(
                'Un nouveau Design à été créé'))
                ->setFrom('cook@labocollectif.fr')
                ->setTo('cook@labocollectif.fr')
                ->setBody($this->renderView(
                    'arbre/mail/notification-synthese.html.twig',
                    [
                        'exercices' => $synthese,
                        'duree' => $dureeRepository->find($dureeId),
                        'groupe' => $groupeRepository->find($groupeId),
                        'titre' => $titre
                    ]),
                    'text/html');;
            $mailer->send($messageAdmin);

            return $this->redirectToRoute('index');
        }
        return $this->render('arbre/synthese.html.twig',
            [
                'exercices' => $synthese,
                'duree' => $dureeRepository->find($dureeId),
                'groupe' => $groupeRepository->find($groupeId),
                'form' => $form->createView()
            ]);
    }

//    /**
//     * @Route("/send", name="synthese-send", methods={"GET","POST"})
//     */
//    public function mail(Request $request, \Swift_Mailer $mailer, DureeRepository $dureeRepository, GroupeRepository $groupeRepository)
//    {
//        $session = $request->getSession();
//        $synthese = $session->get('synthese');
//        $groupeId = $request->query->get('groupe');
//        $dureeId = $request->query->get('duree');
//
//
//        return $this->render('arbre/mail/design-sent.html.twig');
//    }

}