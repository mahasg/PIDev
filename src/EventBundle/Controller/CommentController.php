<?php

namespace EventBundle\Controller;

use EventBundle\Entity\Comment;
use EventBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CommentController extends Controller
{
    public function showAction()
    {
        $comment = $this->getDoctrine()->getRepository(Comment::class)->findAll();
        return $this->render('Event/Front/afficher.html.twig',array('listcomment'=>$comment));
    }

    public function deleteCommentAction($id)
    {
        $comment = $this->getDoctrine()->getRepository(Comment::class)->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($comment);
        $em->flush();
        return $this->redirectToRoute("eventBack");
    }
    public function addCommentAction(Request $request){
        $comment= new Comment();
        $form = $this->createForm(CommentType::class,$comment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid ()  ){
            $em = $this->getDoctrine()->getManager();
            $finduser=  $this->getDoctrine()->getManager()->getRepository(User::class)->find('5');
            $comment->setUser($finduser);
            $em->persist($comment);
            $em->flush();
            return $this->redirectToRoute('eventBack');
        }
        return $this->render("Event/Back/addComment.html.twig",array("formcomment"=>$form->createView()));
    }

    public function ParticiperAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $findevent=  $this->getDoctrine()->getManager()
            ->getRepository(evenement::class)->find($id);
        $finduser=  $this->getDoctrine()->getManager()->getRepository(User::class)->find('1');
        $nomevent=$findevent->getNomEvent();
        if($finduser->getnomEvent()==""){
            $findevent->setCapacite($findevent->getCapacite()-1);
            $em->persist($findevent);
            $finduser->setNomEvent($nomevent);
            $em->persist($finduser);
            $em->flush();
        }
        else{dump('user have an event');}
        return $this->redirectToRoute("eventIndex");
    }
}
