<?php

namespace App\Controller;

use App\Entity\Estado;
use App\Form\EstadoType;
use App\Repository\EstadoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/estado')]
class EstadoController extends AbstractController
{
    #[Route('/', name: 'estado_index', methods: ['GET'])]
    public function index(EstadoRepository $estadoRepository): Response
    {
        return $this->render('estado/index.html.twig', [
            'estados' => $estadoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'estado_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $estado = new Estado();
        $form = $this->createForm(EstadoType::class, $estado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($estado);
            $entityManager->flush();

            return $this->redirectToRoute('estado_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('estado/new.html.twig', [
            'estado' => $estado,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'estado_show', methods: ['GET'])]
    public function show(Estado $estado): Response
    {
        return $this->render('estado/show.html.twig', [
            'estado' => $estado,
        ]);
    }

    #[Route('/{id}/edit', name: 'estado_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Estado $estado, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EstadoType::class, $estado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('estado_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('estado/edit.html.twig', [
            'estado' => $estado,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'estado_delete', methods: ['POST'])]
    public function delete(Request $request, Estado $estado, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$estado->getId(), $request->request->get('_token'))) {
            $entityManager->remove($estado);
            $entityManager->flush();
        }

        return $this->redirectToRoute('estado_index', [], Response::HTTP_SEE_OTHER);
    }
}
