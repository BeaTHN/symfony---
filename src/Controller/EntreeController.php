<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Entree;
use App\Form\EntreeType;
use App\Repository\EntreeRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ProduitRepository;

#[Route('/entree')]
class EntreeController extends AbstractController
{
    #[Route('/', name: 'app_entree_index', methods: ['GET'])]
    public function index(ProduitRepository $produitRepository,EntreeRepository $entreeRepository): Response
    {
        return $this->render('entree/index.html.twig', [
            'entrees' => $entreeRepository->findAll(),
            'produits' => $produitRepository->findAll(),
        ]);
    }

    #[Route('/ajouter', name: 'app_entree_ajouter', methods: ['GET', 'POST'])]
    public function ajouter(Request $request, EntreeRepository $entreeRepository): Response
    {
        $entree = new Entree();
        $form = $this->createForm(EntreeType::class, $entree);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entreeRepository->add($entree, true);

            return $this->redirectToRoute('app_entree_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('entree/index.html.twig', [
            'entree' => $entree,
            'form' => $form,
        ]);
    }

    
}
