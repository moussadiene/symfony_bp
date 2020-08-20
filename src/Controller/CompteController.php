<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Compte;
use App\Entity\Entreprise;
use App\Form\CompteType;
use App\Repository\CompteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompteController extends AbstractController
{
    /**
     * @Route("/compte", name="compte")
     */
    public function indexe(Request $request,CompteRepository $comptedao) : Response
    {
        $compte = new Compte();

        $form = $this->createForm(CompteType::class, $compte);
        $form->handleRequest($request);
        if( $form->isSubmitted() && $form->isValid()){

            $compte = $form->getData();
            $compte->setNumero($this->codeAleatoire());
            $compte->setRib($this->cleRip());
            $em = $this->getDoctrine()->getManager();

            $entreprise = $em->getRepository(Entreprise::class)->find(
                $compte->getEntreprise()->getId()
            );

            $client = $em->getRepository(Client::class)->find(
                $compte->getClient()->getId()
            );

            $compte->setEntreprise($entreprise);
            $compte->setClient($client);
            //$compte->setDateOuverture($this->getDateNow());

            $em->persist($compte);
            $em->flush();
            return $this->redirectToRoute('compte');
        }

        return $this->render('compte\index.html.twig',
                    [
                        'listecomptes' => $comptedao->findAll(),
                        "form" => $form->createView()
                    ]
                );
    }

    private function getDateNow(){
        $tz_object = new \DateTimeZone('UTC');
        $datetime = new \DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y\-m\-d');
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
    private function cleRip()
    {
        $string = "";
        $chaine = "012643789";
        srand((double)microtime()*1000000);
        do{
            for($i=0; $i<2; $i++)
            {
                $string .= $chaine[rand()%strlen($chaine)];
            }
        }while($string=="99" || $string=="98");

        return intval($string);
    }
}
