<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Entreprise;
use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Form\ClientType;

class ClientController extends AbstractController
{
    /**
     * @Route("/client", name="client")
     */
    public function index(Request $request,ClientRepository $clientdao) : Response
    {
        $cli = new Client();

        $form = $this->createForm(ClientType::class, $cli);
        $form->handleRequest($request);
        if( $form->isSubmitted() && $form->isValid()){

            $cli = $form->getData();
            $cli->setMatricule($this->codeAleatoire());
            $em = $this->getDoctrine()->getManager();
            $entreprise = $em->getRepository(Entreprise::class)->find(
                $cli->getEntreprise()->getId()
            );
    
            $cli->setEntreprise($entreprise);
            $em->persist($cli);
            $em->flush();
            return $this->redirectToRoute('client');
        }

        return $this->render('client\list.html.twig',
                    [
                        'listeClients' => $clientdao->findAll(),
                        "form" => $form->createView()
                    ]
                );
    }

    private function codeAleatoire()
    {
        $string = "";
        $chaine = "2643789ABDCEFGHJKMNPRTUVW";
        srand((double)microtime()*1000000);
        for($i=0; $i<8; $i++)
        {
            $string .= $chaine[rand()%strlen($chaine)];
        }
        return $string;
    }


    /*
     * @Route ("/client/index", name="client")
     */
    //  public function index()
    // {
    //     $em = $this->getDoctrine()->getManager();
    //     $client = new Client();
    //     $form = $this->createForm(ClientType::class,$client,
    //                     array(
    //                         'action' => $this->generateUrl('save_client')
    //                     )
    //     );


    //     $clientdao = $em->getRepository(Client::class);

    //     return $this->render('compte/add.html.twig', 
    //     [
    //         'listeClients' => $clientdao->findAll(),
    //         "form" => $form->createView()
    //     ]);
    // }

    /*
     * @Route("/client/add", name="save_client")
     */
    //  public function add(Request $request)
    // {
    //     //Cette function permet de requperer les info du formulaire

    //     $client = new client();

    //     $form = $this->createForm(ClientType::class,$client);

    //     $form->handleRequest($request);

    //     if($form->isSubmitted() && $form->isValid())
    //     {
    //         $client = $form->getData();

    //         $em = $this->getDoctrine()->getManager();
    //         $em->persist($client);
    //         $em->flush();
    //     }

    //     return $this->redirectToRoute('save_client');
    // }


   
}
