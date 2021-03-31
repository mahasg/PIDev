<?php

namespace App\Controller;





use App\Entity\TypeAbonnement;
use Symfony\Component\HttpFoundation\File\UploadedFile;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\TypeAbonnementRepository;


class CartController extends AbstractController
{
    /**
     * @Route("/panier", name="cart_index")
     */
    public function index(SessionInterface $session, TypeAbonnementRepository $TypeAbonnementRepository): Response
    {
        $panier=$session->get('panier',[]);
        $panierWithData=[];
        foreach($panier as $id=>$quantity){

            $ta=$TypeAbonnementRepository->find($id);
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

         return $this->render('cart/List_Panier.html.twig',['items'=>$panierWithData,'total'=>$total,'total_quantity'=>$total_quantity]) ;



    }

    /**
     * @Route("/panier/add/{id}",name="cart_add")
     */

    public function add($id,SessionInterface $session) {


       $panier= $session->get('panier',[]);

       $panier[$id]=1;
       $session->set('panier',$panier);
return $this->redirectToRoute('cart_index');

    }


    /**
     * @Route ("/panier/remove/{id}", name="cart_remove")
     */
    function remove($id,SessionInterface $session){

        $panier=$session->get('panier',[]);
        if(!empty($panier[$id])){

            unset($panier[$id]);
        }
        $session->set('panier',$panier);
        return $this->redirectToRoute("cart_index");


    }
}
