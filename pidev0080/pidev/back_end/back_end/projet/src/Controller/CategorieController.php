<?php

namespace App\Controller;

use App\Entity\Categorie;


use App\Entity\Plat;
use App\Form\CategorieType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie", name="categorie")
     */
    public function index(): Response
    {
        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'CategorieController',
        ]);
    }
    /**
     * @Route("/afficher", name="afficher")
     */
    public function affichers()
    {
        $categorie = $this->getDoctrine()->getRepository(Categorie::class)->findAll();
        return $this->render('categorie/afficher.html.twig',array('listcategorie'=>$categorie));

    }
    /**
     * @Route("/addCategorie", name="addCategorie")
     */
    public function addCategorie(Request $request){
        $categorie= new Categorie();
        $form = $this->createForm(CategorieType::class,$categorie);
        $form->handleRequest($request);
        if ($form->isSubmitted() ){
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();
            return $this->redirectToRoute('afficher');
        }
        return $this->render("categorie/add.html.twig",array("formCategorie"=>$form->createView()));
    }
    /**
     * @Route("/updateCategorie/{idc}", name="updateCategorie")
     */
    public function updateCategorie(Request $request,$idc){
        $categorie=  $this->getDoctrine()->getManager()->getRepository(Categorie::class)->find($idc);

        $form = $this->createForm(CategorieType::class,$categorie);
        $form->handleRequest($request);
        if ($form->isSubmitted() ){
            $em = $this->getDoctrine()->getManager();
            //$em->persist($student);
            $em->flush();//mise a jour
            return $this->redirectToRoute('afficher');
        }
        return $this->render("categorie/add.html.twig",array("formCategorie"=>$form->createView()));
    }
    /**
     * @Route("/deleteCategorie/{idc}", name="deleteCategorie")
     */
    public function deleteCateorie($idc)
    {
        $Classroom = $this->getDoctrine()->getRepository(Categorie::class)->find($idc);
        $em=$this->getDoctrine()->getManager();
        $em->remove($Classroom);
        $em->flush();
        return $this->redirectToRoute("afficher");
    }


}
