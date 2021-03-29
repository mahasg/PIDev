<?php

namespace App\Controller;
use App\Entity\Equipement;
use App\Entity\Reclamation;
use App\Form\EquipementType;
use App\Repository\EquipementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\BarChart;

class EquipementController extends AbstractController
{
    /**
     * @Route("/equipement", name="equipement")
     */
    public function index(): Response
    {
        return $this->render('equipement/index.html.twig', [
            'controller_name' => 'EquipementController',
        ]);
    }
    /**
     * @param EquipementRepository $repository
     * @Route("/listE", name="listE")
     */
    public function list(EquipementRepository $repository,Request $request)
    {
        //$numsalle=$this->get('num');
        $search = new Equipement();
        $form = $this->createForm(EquipementType::class,$search);
        $form->handleRequest($request);
        $equipement= $repository->findAll();

        return $this->render('equipement/listE', [
            'equipement' => $equipement,
            'form'=>$form->createView()
        ]);
    }
    /**
     * @Route("/addE", name="addE")
     */
    public function addE(Request $request){
        $equipement = new equipement();
        $form = $this->createForm(EquipementType::class,$equipement);
        $form->handleRequest($request);
        if ($form->isSubmitted() ){
            $em = $this->getDoctrine()->getManager();
            $em->persist($equipement);
            $em->flush();
            return $this->redirectToRoute("listE");
        }
        return $this->render("equipement/addE",array("formE"=>$form->createView()));
    }
    /**
     * @Route("/searchE ", name="searchE")
     */
    public function searchE(Request $request,EquipementRepository $repository)
    {

        $search = new Equipement();
        $equipement = $repository->findequipement($search);
        return $this->render('equipement/listE', [
            'equipement' => $equipement,
        ]);

    }
    /**
     * @Route("/suppe/{id}", name="suppe")
     */
    public function supprec($id)
    {
        $equipement=$this->getDoctrine()->getRepository(equipement::class)->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($equipement);
        $em->flush();
        return $this->redirectToRoute("listE");
    }
    /**
     * @param EquipementRepository $repository
     * @Route("/triE", name="triE")
     */
    public function triE(EquipementRepository $repository,Request $request)
    {
        $equipement= $repository->OrderByNOM();
        return $this->render('equipement/listE', [
            'equipement' => $equipement
        ]);
    }
    /**
     * @Route("/update/{id}", name="update")
     */
    public function update(Request $request,$id){
        $equipement=  $this->getDoctrine()->getManager()->getRepository(Equipement::class)->find($id);

        $form = $this->createForm(EquipementType::class,$equipement);
        $form->handleRequest($request);
        if ($form->isSubmitted() ){
            $em = $this->getDoctrine()->getManager();
            $em->flush();//mise a jour
            return $this->redirectToRoute('listE');
        }
        return $this->render("equipement/addE",array("formE"=>$form->createView()));
    }
    /**
     * @Route("/recherche", name="recherche")
     */
    public function recherche(EquipementRepository $repository , Request $request)
    {

        $beginprix=$request->get('search1');
        $endprix=$request->get('search2');
        $reclamation=$repository->findItemsCreatedBetweenTwoDates($beginprix,$endprix);
        return $this->render('equipement/listE', [
            'equipement' => $reclamation,
        ]);


    }



}
