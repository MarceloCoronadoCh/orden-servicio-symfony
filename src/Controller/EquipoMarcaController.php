<?php

namespace App\Controller;

use App\Entity\EquipoMarca;
use App\Form\EquipoMarcaType;
use App\Repository\EquipoMarcaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/equipo/marca')]
class EquipoMarcaController extends AbstractController
{
    #[Route('/', name: 'equipo_marca_index', methods: ['GET'])]
    public function index(EquipoMarcaRepository $equipoMarcaRepository): Response
    {
        return $this->render('equipo_marca/index.html.twig', [
            'equipo_marcas' => $equipoMarcaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'equipo_marca_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $equipoMarca = new EquipoMarca();
        $form = $this->createForm(EquipoMarcaType::class, $equipoMarca);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($equipoMarca);
            $entityManager->flush();

            return $this->redirectToRoute('equipo_marca_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('equipo_marca/new.html.twig', [
            'equipo_marca' => $equipoMarca,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'equipo_marca_show', methods: ['GET'])]
    public function show(EquipoMarca $equipoMarca): Response
    {
        return $this->render('equipo_marca/show.html.twig', [
            'equipo_marca' => $equipoMarca,
        ]);
    }

    #[Route('/{id}/edit', name: 'equipo_marca_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EquipoMarca $equipoMarca, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EquipoMarcaType::class, $equipoMarca);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('equipo_marca_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('equipo_marca/edit.html.twig', [
            'equipo_marca' => $equipoMarca,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'equipo_marca_delete', methods: ['POST'])]
    public function delete(Request $request, EquipoMarca $equipoMarca, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$equipoMarca->getId(), $request->request->get('_token'))) {
            $entityManager->remove($equipoMarca);
            $entityManager->flush();
        }

        return $this->redirectToRoute('equipo_marca_index', [], Response::HTTP_SEE_OTHER);
    }
}
