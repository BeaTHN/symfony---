<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Sortie;
use App\Form\SortieType;
use App\Repository\SortieRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ProduitRepository;


class SortieController extends AbstractController
{
    #[Route('/sortie', name: 'app_sortie')]
    public function index(ProduitRepository $produitRepository,SortieRepository $sortieRepository): Response
    {
        return $this->render('sortie/index.html.twig', [
            'sorties' => $sortieRepository->findAll(),
            'produits' => $produitRepository->findAll(),
        ]);
    }

    #[Route('/ajouter', name: 'app_sortie_ajouter', methods: ['GET', 'POST'])]
    public function ajouter(Request $request, SortieRepository $sortieRepository): Response
    {
        $sortie = new Sortie();
        $form = $this->createForm(SortieType::class, $sortie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sortieRepository->add($sortie, true);

            return $this->redirectToRoute('app_sortie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sortie/index.html.twig', [
            'sortie' => $sortie,
            'form' => $form,
        ]);
    }
}
