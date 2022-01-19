<?php

namespace App\Controller;

use App\Entity\TipoPago;
use App\Form\TipoPagoType;
use App\Repository\TipoPagoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/tipo/pago')]
class TipoPagoController extends AbstractController
{
    #[Route('/', name: 'tipo_pago_index', methods: ['GET'])]
    public function index(TipoPagoRepository $tipoPagoRepository): Response
    {
        return $this->render('tipo_pago/index.html.twig', [
            'tipo_pagos' => $tipoPagoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'tipo_pago_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tipoPago = new TipoPago();
        $form = $this->createForm(TipoPagoType::class, $tipoPago);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($tipoPago);
            $entityManager->flush();

            return $this->redirectToRoute('tipo_pago_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tipo_pago/new.html.twig', [
            'tipo_pago' => $tipoPago,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'tipo_pago_show', methods: ['GET'])]
    public function show(TipoPago $tipoPago): Response
    {
        return $this->render('tipo_pago/show.html.twig', [
            'tipo_pago' => $tipoPago,
        ]);
    }

    #[Route('/{id}/edit', name: 'tipo_pago_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TipoPago $tipoPago, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TipoPagoType::class, $tipoPago);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('tipo_pago_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tipo_pago/edit.html.twig', [
            'tipo_pago' => $tipoPago,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'tipo_pago_delete', methods: ['POST'])]
    public function delete(Request $request, TipoPago $tipoPago, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tipoPago->getId(), $request->request->get('_token'))) {
            $entityManager->remove($tipoPago);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tipo_pago_index', [], Response::HTTP_SEE_OTHER);
    }
}
