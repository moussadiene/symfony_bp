<?php

namespace App\Controller;

use App\Entity\Typecompte;
use App\Form\TypecompteType;
use App\Repository\TypecompteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/typecompte")
 */
class TypecompteController extends AbstractController
{
    /**
     * @Route("/", name="typecompte_index", methods={"GET"})
     */
    public function index(TypecompteRepository $typecompteRepository): Response
    {
        return $this->render('typecompte/index.html.twig', [
            'typecomptes' => $typecompteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="typecompte_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typecompte = new Typecompte();
        $form = $this->createForm(TypecompteType::class, $typecompte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typecompte);
            $entityManager->flush();

            return $this->redirectToRoute('typecompte_index');
        }

        return $this->render('typecompte/new.html.twig', [
            'typecompte' => $typecompte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="typecompte_show", methods={"GET"})
     */
    public function show(Typecompte $typecompte): Response
    {
        return $this->render('typecompte/show.html.twig', [
            'typecompte' => $typecompte,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="typecompte_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Typecompte $typecompte): Response
    {
        $form = $this->createForm(TypecompteType::class, $typecompte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typecompte_index');
        }

        return $this->render('typecompte/edit.html.twig', [
            'typecompte' => $typecompte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="typecompte_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Typecompte $typecompte): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typecompte->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typecompte);
            $entityManager->flush();
        }

        return $this->redirectToRoute('typecompte_index');
    }
}
