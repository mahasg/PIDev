<?php

namespace App\Controller;

use App\Form\ContactType;
use Swift_Mailer;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            // On crée le message
            $message = (new Swift_Message('Reclamation employe'))
                // On attribue l'expéditeur
                ->setFrom($contact['email'])
                // On attribue le destinataire
                ->setTo('djebbi.hanine20@gmail.com')
                // On crée le texte avec la vue
                ->setBody(
                    $this->renderView(
                        'emails/contact.html.twig', compact('contact')
                    ),
                    'text/html'
                )
            ;
            //envoie le msg
            $mailer->send($message);

            $this->addFlash('message', 'Votre message a été transmis, nous vous répondrons dans les meilleurs délais.'); // Permet un message flash de renvoi
            return $this->redirectToRoute ('afficherc');
        }
        return $this->render('contact/index.html.twig',['contactForm' => $form->createView()]);
    }


    /**
     * @Route("/contactautoconf", name="contactautoconf")
     */
    public function contactautoconf(Request $request, Swift_Mailer $mailer)
    {


            // On crée le message
            $message = (new Swift_Message('confirmation conge'))
                // On attribue l'expéditeur
                ->setFrom('no-reply@happypark.com')
                // On attribue le destinataire
                ->setTo('djebbi.hanine20@gmail.com')
                // On crée le texte avec la vue
                ->setBody(
                    $this->renderView(
                        'emails/contactautoconf.html.twig', compact('contactauto')
                    ),
                    'text/html'
                )
            ;
            //envoie le msg
            $mailer->send($message);

            $this->addFlash('message', 'Votre message a été transmis, nous vous répondrons dans les meilleurs délais.'); // Permet un message flash de renvoi
            return $this->redirectToRoute ('afficherc2');


    }

    /**
     * @Route("/contactautoref", name="contactautoref")
     */
    public function contactautoref(Request $request, Swift_Mailer $mailer)
    {


        // On crée le message
        $message = (new Swift_Message('refus conger'))
            // On attribue l'expéditeur
            ->setFrom('no-reply@happypark.com')
            // On attribue le destinataire
            ->setTo('djebbi.hanine20@gmail.com')
            // On crée le texte avec la vue
            ->setBody(
                $this->renderView(
                    'emails/contactautoref.html.twig', compact('contactauto')
                ),
                'text/html'
            )
        ;
        //envoie le msg
        $mailer->send($message);

        $this->addFlash('message', 'Votre message a été transmis, nous vous répondrons dans les meilleurs délais.'); // Permet un message flash de renvoi
        return $this->redirectToRoute ('afficherc2');


    }


}
