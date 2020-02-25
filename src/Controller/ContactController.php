<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/contact")
 */
class ContactController extends AbstractController
{
    /**
     * @Route("/", name="contact", methods={"GET","POST"})
     */
    public function contact(Request $request, \Swift_Mailer $mailer)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact= $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();

            $message = (new \Swift_Message('Vous avez un nouveau message'))
                ->setFrom('cook@labocollectif.fr')
                ->setTo('cook@labocollectif.fr')
                ->setBody($this->renderView('contact/email/notifications.html.twig',
                    [
                        'contact' => $contact
                    ]),
                    'text/html');
            ;
            $mailer->send($message);

            return $this->redirectToRoute('index');
        }
        return $this->render('contact/contact.html.twig',
            [
                'form' => $form ->createView(),
            ]
        );
    }
}
