<?php

namespace App\Controller;


use App\Entity\Cinema;
use App\Entity\Demande;
use App\Entity\Reserv;
use App\Form\CinemaType;
use App\Form\ReservType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservController extends AbstractController
{
    /**
     * @Route("/reservation", name="reservation")
     */
    public function index(): Response
    {
        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'ReservController',
        ]);
    }

    /**
     * @Route("/afficheReservation", name="afficheReservation")
     */
    public function afficheReservation()
    {
        $Res = $this->getDoctrine()->getRepository(Reserv::class)->findAll();
        return $this->render('reservation\listReservation.html.twig',array('list'=>$Res));

    }

    /**
     * @Route ("/addReservation" , name="addReservation")
     */

    public function addReservation(\Symfony\Component\HttpFoundation\Request $request)
    {
        $Res= new Reserv();
        $form = $this->createForm(ReservType::class,$Res);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($Res);
            $em->flush();
            return $this->redirectToRoute("afficheReservation");
        }
        return $this->render("addReservation.html.twig",array('form'=>$form->createView()));
    }



    /**
     * @Route("/updateReservation/{id}", name="updateReservation")
     */
    public function updateReservation(Request $request,$id){
        $Res=  $this->getDoctrine()->getManager()->getRepository(Reserv::class)->find($id);

        $form = $this->createForm(ReservType::class,$Res);
        $form->handleRequest($request);
        if ($form->isSubmitted() ){
            $em = $this->getDoctrine()->getManager();
            //$em->persist($student);
            $em->flush();//mise a jour
            return $this->redirectToRoute('afficheReservation');
        }
        return $this->render("addReservation.html.twig",array("form"=>$form->createView()));
    }
    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete($id)
    {
        $Res=  $this->getDoctrine()->getManager()->getRepository(Reserv::class)->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($Res);
        $em->flush();
        return $this->redirectToRoute('afficheReservation');
    }
}
