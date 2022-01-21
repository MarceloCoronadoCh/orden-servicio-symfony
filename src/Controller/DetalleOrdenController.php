<?php

namespace App\Controller;

use App\Entity\DetalleOrden;
use App\Form\DetalleOrdenType;
use App\Repository\DetalleOrdenRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/detalle/orden')]
class DetalleOrdenController extends AbstractController
{
    #[Route('/', name: 'detalle_orden_index', methods: ['GET'])]
    public function index(DetalleOrdenRepository $detalleOrdenRepository): Response
    {
        return $this->render('detalle_orden/index.html.twig', [
            'detalle_ordens' => $detalleOrdenRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'detalle_orden_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $detalleOrden = new DetalleOrden();
        $form = $this->createForm(DetalleOrdenType::class, $detalleOrden);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($detalleOrden);
            $entityManager->flush();

            return $this->redirectToRoute('detalle_orden_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('detalle_orden/new.html.twig', [
            'detalle_orden' => $detalleOrden,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'detalle_orden_show', methods: ['GET'])]
    public function show(DetalleOrden $detalleOrden): Response
    {
        return $this->render('detalle_orden/show.html.twig', [
            'detalle_orden' => $detalleOrden,
        ]);
    }

    #[Route('/{id}/edit', name: 'detalle_orden_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DetalleOrden $detalleOrden, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DetalleOrdenType::class, $detalleOrden);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('detalle_orden_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('detalle_orden/edit.html.twig', [
            'detalle_orden' => $detalleOrden,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'detalle_orden_delete', methods: ['POST'])]
    public function delete(Request $request, DetalleOrden $detalleOrden, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$detalleOrden->getId(), $request->request->get('_token'))) {
            $entityManager->remove($detalleOrden);
            $entityManager->flush();
        }

        return $this->redirectToRoute('detalle_orden_index', [], Response::HTTP_SEE_OTHER);
    }
}
