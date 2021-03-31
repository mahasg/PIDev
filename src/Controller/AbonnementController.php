<?php

namespace App\Controller;
use App\Entity\Abonnement;
use App\Form\AbonnementType;
use Symfony\Component\HttpFoundation\Request;

use App\Repository\AbonnementRepository;
use App\Repository\AbonneRepository;
use App\Repository\TypeAbonnementRepository;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

use Symfony\Bridge\Twig\Mime\NotificationEmail;

class AbonnementController extends AbstractController
{
    /**
     * @Route("/abonnement", name="abonnement")
     */
    public function index(): Response
    {
        return $this->render('abonnement/index.html.twig', [
            'controller_name' => 'AbonnementController',
        ]);
    }
    /**
     * @return Response
     * @Route("/addabonnement",name="addabonnement")
     */
    public function AddAbonnement(SessionInterface $session,TypeAbonnementRepository $TypeAbonnementRepository,\Swift_Mailer $mailer)
    {

        $em=$this->getDoctrine()->getManager();
        $conf=0;
        ###########################
        $panier=$session->get('panier',[]);
        $panierWithData=[];

        ############################################"
        foreach($panier as $id=>$quantity){
            $abonnement=new Abonnement();
            $ta=$TypeAbonnementRepository->find($id);
            $abonnement->setTypeAbonnement($ta);
            $abonnement->setAbonne($this->getUser());
            $abonnement->setDatedemande(new \DateTime());
            $abonnement->setDateDebut(new \DateTime());
            $abonnement->setDateFin(new \DateTime());
            $abonnement->setValide(0);

            $em->persist($abonnement);
            $em->flush();
            $conf=1;
            $panierWithData[]= [
                'ta'=>$ta,
                'quantity'=>$quantity
            ];

        }


        $total=0;
        $total_quantity=0;

        foreach ($panierWithData as $item){
            $p=$item['ta']->getPrix();
            $totalItem =$p  * $item['quantity'];
            $total += $totalItem;
            $total_quantity++;


        }
        ######################################  email
        $message_conf="Veuillez tout d'abord choisir l'abonnement qui vous convient";
if($conf==1){
    $message_conf="Veuillez procéder au paiement de votre abonnement au local de HappyPark pour l'activer au plus tard deux jours après!";

    $message = (new \Swift_Message('HappyPark!'))
        ->setFrom('zeineb.karma@esprit.tn')
        ->setTo('zeineb.karma@esprit.tn')
    ->setBody("hello" )
        ->addPart($this->render('Abonnement/email.html.twig'
        ,['items'=>$panierWithData,'total'=>$total,'total_quantity'=>$total_quantity]))
    ->setContentType('text\html');

    $mailer->send($message);

}
############################################ /email
        $session->set('panier',[]);


        return $this->render("Abonnement\index.html.twig",['message_conf'=>$message_conf]);
    }


    /**
     * @return Response
     * @Route("/mesabonnements",name="mesabonnements")
     */
    public function MesAbonnements(AbonnementRepository $repository)
    {


       $MesAbonnements=$repository->findBy(
            ['abonne' => $this->getUser()],
            ['id' => 'DESC']
        );
        return $this->render("Abonnement\MesAbonnements.html.twig",['mes'=>$MesAbonnements]);
    }

    /**
     * @param AbonnementRepository $repository
     * @return Response
     * @Route("/Afficheabonnement",name="Afficheabonnement")
     */
    public function Afficheabonnement(AbonnementRepository $repository): Response
    {
        $abonnement=$repository->findAll();
        return $this->render('abonnement/Afficheabonnement.html.twig',['abonnement'=>$abonnement]);

    }

    /**
     * @Route("/Supp/{id}",name="DeleteAbonnement")
     */

    function Delete($id,AbonnementRepository $repository) {
        $Abonnement =$repository->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($Abonnement);
        $em->flush();
        return $this->redirectToRoute('mesabonnements');
    }

    /**
     * @param AbonnementRepository $repository
     * @return Response
     * @Route("/updateAbo/{id}", name="validerAbo")
     */
    public function updateAbonnement(Request $request,AbonnementRepository $repository,$id){
        $Abonnement=  $repository->find($id);


            $em=$this->getDoctrine()->getManager();
            $Abonnement->setValide(1);
        $date = new \DateTime();

            $Abonnement->setDatedebut(new \DateTime());
        $date->modify('+1 month');

        $Abonnement->setDatefin($date);
            $em->flush();//mise a jour
            return $this->redirectToRoute('admin_abonnement');

    }

    /**
     * @Route("/admin_abonnement", name="admin_abonnement")
     */
    public function admin_abonnement(AbonnementRepository $repository): Response
    {   $nowwmintwo = new \DateTime();

        $nowwmintwo->modify('-2 days');

        $abonnementlasttwodays=$repository->getabolasttwodays();
        $nbValide=$repository->getNbValide();
        $nbEnAttente=$repository->getNbEnAttente();
        return $this->render('abonnement/Admin_abonnement.html.twig',['abonnement'=>$abonnementlasttwodays,
            'nbValide'=>$nbValide,'nbEnAttente'=>$nbEnAttente]);


    }




}
