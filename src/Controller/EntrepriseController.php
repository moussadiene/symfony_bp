<?php
namespace App\Controller;

use App\Entity\Entreprise;
use App\Form\EntrepriseType;
use App\Repository\EntrepriseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

//use Symfony\Component
class EntrepriseController extends AbstractController{
  /**
     * @Route ("/entreprise", name="entreprise")
     * @param Request $request
     * @return Response 
     */
  
    // public function indexs(EntrepriseRepository $entrepriseDB)
    // {
    //     $ense = new Entreprise();
    //     $form = $this->createForm(EntrepriseType::class, $ense);
    //     return $this->render('entreprise/index.html.twig', [
    //         'listeEntreprises' => $entrepriseDB->findAll(),
    //         "form" => $form->createView()
    //     ]);
    // }
     /**
     * @Route ("/entreprise", name="entreprise")
     * @param Request $request
     * @return Response 
     */
    public function index(Request $request,EntrepriseRepository $entrepriseDB) : Response
    {
        $ense = new Entreprise();
        
        $form = $this->createForm(EntrepriseType::class, $ense);
        $form->handleRequest($request);
        if( $form->isSubmitted() && $form->isValid()){

            $db = $this->getDoctrine()->getManager();
            $db->persist($ense);
            $db->flush();
            return $this->redirectToRoute('entreprise');
        }

        return $this->render('entreprise\index.html.twig',
                    [
                        'listeEntreprises' => $entrepriseDB->findAll(),
                        "form" => $form->createView()
                    ]
                );
    }
}