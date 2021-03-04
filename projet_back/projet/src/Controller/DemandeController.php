<?php

namespace App\Controller;

use App\Entity\Demande;
use App\Entity\Reserv;
use App\Form\DemandeType;
use App\Form\ReservType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemandeController extends AbstractController
{
    /**
     * @Route("/demande", name="demande")
     */
    public function index(): Response
    {
        return $this->render('demande/index.html.twig', [
            'controller_name' => 'DemandeController',
        ]);
    }

    /**
     * @Route("/demande/Liste", name="ListeDemande")
     */

    public function ListeDemande(){
        $repo=$this->getDoctrine()->getRepository(Demande::class)->findAll();
        return $this->render( "demande/Demande.html.twig" ,array('liste'=>$repo));

    }

    /**
     * @Route ("/addDemande" , name="addDemande")
     */

    public function addDemande(\Symfony\Component\HttpFoundation\Request $request)
    {
        $Res= new Demande();
        $form = $this->createForm(DemandeType::class,$Res);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($Res);
            $em->flush();
            return $this->redirectToRoute("ListeDemande");
        }
        return $this->render("reclamation.html.twig",array('formDemande'=>$form->createView()));
    }

    /**
     * @Route("/updateDemande/{id}", name="updateDemande")
     */
    public function updateDemande(Request $request,$id){
        $Res=  $this->getDoctrine()->getManager()->getRepository(Demande::class)->find($id);

        $form = $this->createForm(DemandeType::class,$Res);
        $form->handleRequest($request);
        if ($form->isSubmitted() ){
            $em = $this->getDoctrine()->getManager();
            //$em->persist($student);
            $em->flush();//mise a jour
            return $this->redirectToRoute('ListeDemande');
        }
        return $this->render("demande/updateDemande.html.twig",array("formDemande"=>$form->createView()));
    }

    /**
     * @Route("/deleteDemande/{id}", name="deleteDemande")
     */
    public function deleteDemande($id)
    {
        $Res = $this->getDoctrine()->getManager()->getRepository(Demande::class)->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($Res);
        $em->flush();
        return $this->redirectToRoute("ListeDemande");
    }
}
