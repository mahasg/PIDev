<?php

namespace App\Controller;





use App\Entity\Abonne;
use App\Form\AbonneType;
use App\Repository\AbonneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AbonneController extends AbstractController
{
    /**
     * @Route("/", name="abonne")
     */
    public function index(): Response
    {
        return $this->redirectToRoute("ListTypeAbonnement");

    }

    /**
     * @param AbonneRepository $repository
     * @return Response
     * @Route("/Afficheabo",name="Afficheabo")
     */
    public function Afficheabo(AbonneRepository $repository): Response
    {
        $abonne=$repository->findAll();
        return $this->render('abonne/Affiche.html.twig',['abonne'=>$abonne]);

    }

    /**
     * @Route("/Supp/{id}",name="d")
     */

    function Delete($id,AbonneRepository $repository) {
        $abonne =$repository->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($abonne);
        $em->flush();
        return $this->redirectToRoute('Afficheabo');
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/Addabonne",name="Addabonne")
     */
    function Add(Request $request,UserPasswordEncoderInterface $encoder){
        $abonne=new Abonne();
        $form=$this->createForm(AbonneType::class,$abonne);

        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $hash=$encoder->encodePassword($abonne,$abonne->getPassword());
            $abonne->setPassword($hash);
            $em=$this->getDoctrine()->getManager();

            $em->persist($abonne);
            $em->flush();
            return $this->redirectToRoute('security_login');

        }
        return $this->render('abonne/Add.html.twig',[
            'formAbonne'=>$form->createView()
        ]) ;

    }

    /**
     * @Route ("/tri",name="tri")
     */
    public function tri(AbonneRepository $repository , Request $request)
    {
        $abonne=$repository->OrderByName();
        return $this->render('abonne/Affiche.html.twig',['abonne'=>$abonne]);
    }

    /**
     * @Route("/connexion",name="security_login")
     */
    public function login( AuthenticationUtils $authUtils){
        // get the login error if there is one
        $error = $authUtils->getLastAuthenticationError();

        // last username entered by the user
        $email = $authUtils->getLastUsername();



        return $this->render('abonne/login.html.twig',['error'=>$error,'email'=>$email]);


    }

    /**
     * @Route("/deconnexion",name="security_logout")
     */
    public function logout(){

    }





}
