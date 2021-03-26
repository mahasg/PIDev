<?php

namespace App\Controller;

use App\Entity\employe;


use App\Form\EmployeType;
use App\Repository\CongeRepository;
use App\Repository\EmployeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployeController extends AbstractController
{
    /**
     * @Route("/employe", name="employe")
     */
    public function index():Response
    {
        return $this->render('employe/index.html.twig', [
            'controller_name' => 'EmployeController',
        ]);
    }
    /**
     * @Route("/afficher", name="afficher")
     */
    public function affichers()
    {
        $employe = $this->getDoctrine()->getRepository(employe::class)->findAll();
        return $this->render('employe/afficher.html.twig',array('listemploye'=>$employe));

    }

    /**
     * @Route("/addEmploye", name="addEmploye")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function addEmploye(Request $request){
        $employe= new employe();
        $form = $this->createForm(EmployeType::class,$employe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid () ){
            $em = $this->getDoctrine()->getManager();
            $em->persist($employe);
            $em->flush();
            return $this->redirectToRoute('afficher');
        }
        return $this->render("employe/add.html.twig",array("formEmploye"=>$form->createView()));
    }

    /**
     * @Route("/updateEmploye/{idemp}", name="updateEmploye")
     * @param Request $request
     * @param $idemp
     * @return RedirectResponse|Response
     */
    public function updateEmploye(Request $request,$idemp){
        $employe=  $this->getDoctrine()->getManager()->getRepository(employe::class)->find($idemp);

        $form = $this->createForm(EmployeType::class,$employe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid () ){
            $em = $this->getDoctrine()->getManager();
            //$em->persist($student);
            $em->flush();//mise a jour
            return $this->redirectToRoute('afficher');
        }
        return $this->render("employe/add.html.twig",array("formEmploye"=>$form->createView()));
    }

    /**
     * @Route("/delete/{idemp}", name="delete")
     * @param $idemp
     * @return RedirectResponse
     */
    public function delete($idemp)
    {
        $Employe = $this->getDoctrine()->getRepository(employe::class)->find($idemp);
        $em=$this->getDoctrine()->getManager();
        $em->remove($Employe);
        $em->flush();
        return $this->redirectToRoute("afficher");
    }
    /**
     * @Route ("/search",name="search")
     */
    public function recherche(CongeRepository $repository , Request $request)
    {
        $data=$request->get('search');
        $conge=$repository->Searchid($data);
        return $this->render('conge/search.html.twig',array('listconge'=>$conge));
    }

}
