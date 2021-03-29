<?php

namespace App\Controller;


use App\Entity\Reclamation;
use App\Form\ReclamationType2;
use App\Repository\ReclamationRepository;
use Swift_Mailer;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\BarChart;

class ReclamationController extends AbstractController
{
    /**
     * @Route("/reclamation", name="reclamation")
     */
    public function displayAction(): Response
    {
        $reclamation = $this->getDoctrine()->getManager()->getRepository(Reclamation::class)->findAll();
        return $this->render('reclamation/index.html.twig', array(
            'reclamation' => $reclamation,
        ));
    }

    /**
     * @param ReclamationRepository $repository
     * @Route("/list", name="list")
     */
    public function list1(ReclamationRepository $repository)
    {
        $reclamation = $repository->findAll();
        return $this->render('reclamation/list', [
            'reclamation' => $reclamation,
        ]);
    }

    /**
     * @param ReclamationRepository $repository
     * @Route("/listrec", name="listrec")
     */
    public function list(ReclamationRepository $repository)
    {
        $reclamation = $repository->findAll();
        return $this->render('reclamation/listrec', [
            'reclamation' => $reclamation,
        ]);
    }

    /**
     * @Route("/supprec/{idrec}", name="supprec")
     */
    public function supprec($idrec)
    {
        $reclamation = $this->getDoctrine()->getRepository(reclamation::class)->find($idrec);
        $em = $this->getDoctrine()->getManager();
        $em->remove($reclamation);
        $em->flush();
        return $this->redirectToRoute("listrec");
    }

    /**
     * @Route("/addrec", name="addrec")
     */
    public function addrec(Request $request, Swift_Mailer $mailer)
    {
        $reclamation = new reclamation();
        $form = $this->createForm(ReclamationType2::class, $reclamation);
        $form->handleRequest($request);
        $description = $form->get('description')->getData();
        $field = $form->get('Field')->getData();
        $abonne = $form->get('abonne')->getData();
        if ($form->isSubmitted() ) {

            $servername = "localhost";//Server Name
            $username = "root";//Server User Name
            $password = "";//Server Password
            $dbname = "happy";//Database Name

//Create DB Connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $rating = $_POST["rating"];

                $sql = "INSERT INTO reclamation (description,field,rate,abonne_id) VALUES ('$description','$field','$rating','$abonne')";

                if (mysqli_query($conn, $sql)) {
                    echo "New Rate addedddd successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                mysqli_close($conn);
            }
            $message = (new Swift_Message('confirmation reclamation'))
                // On attribue l'expéditeur
                ->setFrom('no-reply@happypark.com')
                // On attribue le destinataire
                ->setTo('farahbenmahmoud.esp1@gmail.com')
                // On crée le texte avec la vue
                ->setBody(
                    $this->renderView(
                        'reclamation/notificationmail', compact('addrec')
                    ),
                    'text/html'
                )
            ;
            //envoie le msg
            $mailer->send($message);

            $this->addFlash('message', 'Votre message a été transmis, nous vous répondrons dans les meilleurs délais.'); // Permet un message flash de renvoi

            return $this->redirectToRoute ('addrec');


        }
        return $this->render("reclamation/add.html.twig", array("form" => $form->createView()));
    }

    /**
     * @Route("/search ", name="search")
     */
    public function search(Request $request, ReclamationRepository $repository)
    {
        $field = $request->get('search');
        $reclamation = $repository->findStudentByfield($field);
        return $this->render('reclamation/listrec', [
            'reclamation' => $reclamation,
        ]);

    }

    /**
     * @param ReclamationRepository $repository
     * @Route("/tri", name="tri")
     */
    public function tri(ReclamationRepository $repository, Request $request)
    {
        $reclamation = $repository->OrderByDateQB();
        return $this->render('reclamation/listrec', [
            'reclamation' => $reclamation,
        ]);
    }
    /**
     * @Route("/notif", name="notif")
     */
    public function notif(Request $request, Swift_Mailer $mailer)
    {
        // On crée le message
        $message = (new Swift_Message('confirmation reclamation'))
            // On attribue l'expéditeur
            ->setFrom('no-reply@happypark.com')
            // On attribue le destinataire
            ->setTo('farahbenmahmoud.esp1@gmail.com')
            // On crée le texte avec la vue
            ->setBody(
                $this->renderView(
                    'reclamation/notificationmail', compact('notif')
                    ),
                'text/html'
            )
        ;
        //envoie le msg
        $mailer->send($message);

        $this->addFlash('message', 'Votre message a été transmis, nous vous répondrons dans les meilleurs délais.'); // Permet un message flash de renvoi
        return $this->redirectToRoute ('addrec');


    }

    /**
     * @Route("/statistiques",name="statistiques")
     * @param ReclamationRepository $repository
     */
    public function statistiques(ReclamationRepository $repository): Response
    {

        $nbs = $repository->getNB();
        $data = [['Date', 'Reclamation']];
        foreach($nbs as $nb)
        {
            $data[] = array($nb['date'], $nb['vid']);
        }
        $bar = new barchart();
        $bar->getData()->setArrayToDataTable(
            $data
        );

        $bar->getOptions()->getTitleTextStyle()->setColor('#07600');
        $bar->getOptions()->getTitleTextStyle()->setFontSize(50);
        return $this->render('reclamation/statistique.html.twig', array('barchart' => $bar,'nbs' => $nbs));

    }

}