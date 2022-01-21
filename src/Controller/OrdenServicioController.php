<?php

namespace App\Controller;

use App\Entity\OrdenServicio;
use App\Form\OrdenServicioType;
use App\Repository\OrdenServicioRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/orden/servicio')]
class OrdenServicioController extends AbstractController
{
    #[Route('/', name: 'orden_servicio_index', methods: ['GET'])]
    public function index(OrdenServicioRepository $ordenServicioRepository): Response
    {
        return $this->render('orden_servicio/index.html.twig', [
            'orden_servicios' => $ordenServicioRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'orden_servicio_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ordenServicio = new OrdenServicio();
        $form = $this->createForm(OrdenServicioType::class, $ordenServicio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ordenServicio);
            $entityManager->flush();

            return $this->redirectToRoute('orden_servicio_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('orden_servicio/new.html.twig', [
            'orden_servicio' => $ordenServicio,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'orden_servicio_show', methods: ['GET'])]
    public function show(OrdenServicio $ordenServicio): Response
    {
        return $this->render('orden_servicio/show.html.twig', [
            'orden_servicio' => $ordenServicio,
        ]);
    }

    #[Route('/{id}/edit', name: 'orden_servicio_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, OrdenServicio $ordenServicio, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OrdenServicioType::class, $ordenServicio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('orden_servicio_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('orden_servicio/edit.html.twig', [
            'orden_servicio' => $ordenServicio,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'orden_servicio_delete', methods: ['POST'])]
    public function delete(Request $request, OrdenServicio $ordenServicio, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ordenServicio->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ordenServicio);
            $entityManager->flush();
        }

        return $this->redirectToRoute('orden_servicio_index', [], Response::HTTP_SEE_OTHER);
    }
}
