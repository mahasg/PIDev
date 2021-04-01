<?php

namespace EventBundle\Controller;

use EventBundle\Entity\Comment;
use EventBundle\Entity\Evenement;
use EventBundle\Entity\User;
use EventBundle\Form\CommentType;
use EventBundle\Form\EvenementType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EvenementController extends Controller
{
    public function showAction(Request $request)
    {
        $evenement = $this->getDoctrine()->getRepository(Evenement::class)->findAll();
        $comment1 = $this->getDoctrine()->getRepository(Comment::class)->findAll();

        $comment= new Comment();
        $form = $this->createForm(CommentType::class,$comment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid ()  ){
            $em = $this->getDoctrine()->getManager();
            $finduser=  $this->getDoctrine()->getManager()->getRepository(User::class)->find('5');
            $comment->setUser($finduser);
            $em->persist($comment);
            $em->flush();
            return $this->redirectToRoute('eventIndex');
        }
        return $this->render("Event/Front/afficher.html.twig",array("formcomment"=>$form->createView(),'listevenement'=>$evenement,'listcomment'=>$comment1));
    }

    public function showBackAction()
    {
        $evenement = $this->getDoctrine()->getRepository(Evenement::class)->findAll();
        $comment = $this->getDoctrine()->getRepository(Comment::class)->findAll();
        return $this->render('Event/Back/afficher.html.twig',array('listevenement'=>$evenement,'listcomment'=>$comment));

    }

    public function addEventAction(Request $request){
        $evenement= new Evenement();
        $form = $this->createForm(EvenementType::class,$evenement);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid ()  ){
            $em = $this->getDoctrine()->getManager();
            $em->persist($evenement);
            $em->flush();
            return $this->redirectToRoute('eventBack');
        }
        return $this->render("Event/Back/add.html.twig",array("formevenement"=>$form->createView()));
    }

    public function updatEeventAction(Request $request,$id){
        $evenement=  $this->getDoctrine()->getManager()->getRepository(evenement::class)->find($id);

        $form = $this->createForm(EvenementType::class,$evenement);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid () ){
            $em = $this->getDoctrine()->getManager();
            $em->flush();//mise a jour
            return $this->redirectToRoute('eventBack');
        }
        return $this->render("Event/Back/add.html.twig",array("formevenement"=>$form->createView()));
    }

    public function deleteEventAction($id)
    {
        $evenement = $this->getDoctrine()->getRepository(evenement::class)->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($evenement);
        $em->flush();
        return $this->redirectToRoute("eventBack");
    }

    public function ParticiperAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $findevent=  $this->getDoctrine()->getManager()
            ->getRepository(evenement::class)->find($id);
        $finduser=  $this->getDoctrine()->getManager()->getRepository(User::class)->find('5');
        $nomevent=$findevent->getNomEvent();
        if($finduser->getnomEvent()==""){
            $findevent->setCapacite($findevent->getCapacite()-1);
            $em->persist($findevent);
            $finduser->setNomEvent($nomevent);
            $em->persist($finduser);
            $em->flush();
        }
        return $this->redirectToRoute("eventIndex");
    }

    public function QuitterEvAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $findevent=  $this->getDoctrine()->getManager()
            ->getRepository(evenement::class)->find($id);
        $finduser=  $this->getDoctrine()->getManager()
            ->getRepository(User::class)->find('5');
        if($finduser->getnomEvent()!=""){
            $findevent->setCapacite($findevent->getCapacite()+1);
            $em->persist($findevent);
            $finduser->setNomEvent("");
            $em->persist($finduser);
            $em->flush();}

        return $this->redirectToRoute("eventIndex");
    }
    public function pdfAction(Request $request,$nom,$Date,$Date_Fin,$capacite,$emplacement)
    {
        $snappy = $this->get('knp_snappy.pdf');
        $html = $this->render('Event/Back/pdf.html.twig', [
            'nom' => $nom,
            'Date' => $Date,
            'Date_Fin' => $Date_Fin,
            'capacite' => $capacite,
            'emplacement' => $emplacement
        ]);
        $filename = 'SnappyPDF';
        return new Response(
            $snappy->getOutputFromHtml($html),200,array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'
            )
        );
    }
}
