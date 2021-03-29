<?php

namespace App\Controller;

use App\Entity\Abonne;
use App\Form\AbonneType;
use App\Repository\AbonneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AbonneController extends AbstractController
{
    /**
     * @Route("/abonne", name="abonne")
     */
    public function index(): Response
    {
        return $this->render('abonne/index.html.twig', [
            'controller_name' => 'AbonneController',
        ]);
    }

    /**
     * @param AbonneRepository $repository
     * @Route("/listA", name="listA")
     */
    public function list(AbonneRepository $repository)
    {
        $abonne= $repository->findAll();
        return $this->render('abonne/listA', [
            'abonne' => $abonne,
        ]);
    }
    /**
     * @Route("/addA", name="addA")
     */
    public function addStudent(Request $request){
        $abonne= new abonne();
        $form = $this->createForm(AbonneType::class,$abonne);
        $form->handleRequest($request);
        if ($form->isSubmitted() ){
            $em = $this->getDoctrine()->getManager();
            $em->persist($abonne);
            $em->flush();
            return $this->redirectToRoute('listA');
        }
        return $this->render("abonne/addA",array("formA"=>$form->createView()));
    }
}
