<?php

namespace App\Controller;

use App\Entity\Conge;

use App\Form\CongeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CongeController extends AbstractController
{
    /**
     * @Route("/conge", name="conge")
     */
    public function index(): Response
    {
        return $this->render('conge/indexc.html.twig', [
            'controller_name' => 'CongeController',
        ]);
    }



    /**
     * @Route("/afficherc", name="afficherc")
     */
    public function affichersc()
    {
        $conge = $this->getDoctrine()->getRepository(Conge::class)->findAll();
        return $this->render('conge/afficherc.html.twig',array('listconge'=>$conge));

    }

    /**
     * @Route("/addConge", name="addConge")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function addConge(Request $request){
        $conge= new conge();
        $form = $this->createForm(CongeType::class,$conge);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() ){
            $em = $this->getDoctrine()->getManager();
            $em->persist($conge);
            $em->flush();
            return $this->redirectToRoute('afficherc');
        }
        return $this->render("conge/addc.html.twig",array("formConge"=>$form->createView()));
    }

    /**
     * @Route("/updateConge/{idconge}", name="updateConge")
     * @param Request $request
     * @param $idconge
     * @return RedirectResponse|Response
     */
    public function updateEmploye(Request $request,$idconge){
        $conge=  $this->getDoctrine()->getManager()->getRepository(Conge::class)->find($idconge);

        $form = $this->createForm(CongeType::class,$conge);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() ){
            $em = $this->getDoctrine()->getManager();
            //$em->persist($conge);
            $em->flush();//mise a jour
            return $this->redirectToRoute('afficherc');
        }
        return $this->render("conge/addc.html.twig",array("formConge"=>$form->createView()));
    }

    /**
     * @Route("/deletec/{idconge}", name="deletec")
     * @param $idconge
     * @return RedirectResponse
     */
    public function delete($idconge)
    {
        $Conge = $this->getDoctrine()->getRepository(Conge::class)->find($idconge);
        $em=$this->getDoctrine()->getManager();
        $em->remove($Conge);
        $em->flush();
        return $this->redirectToRoute("afficherc");
    }


}
