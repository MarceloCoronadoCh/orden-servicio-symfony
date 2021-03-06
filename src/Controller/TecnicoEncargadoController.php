<?php

namespace App\Controller;

use App\Entity\TecnicoEncargado;
use App\Form\TecnicoEncargadoType;
use App\Repository\TecnicoEncargadoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/tecnico/encargado')]
class TecnicoEncargadoController extends AbstractController
{
    #[Route('/', name: 'tecnico_encargado_index', methods: ['GET'])]
    public function index(TecnicoEncargadoRepository $tecnicoEncargadoRepository): Response
    {
        return $this->render('tecnico_encargado/index.html.twig', [
            'tecnico_encargados' => $tecnicoEncargadoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'tecnico_encargado_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tecnicoEncargado = new TecnicoEncargado();
        $form = $this->createForm(TecnicoEncargadoType::class, $tecnicoEncargado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($tecnicoEncargado);
            $entityManager->flush();

            return $this->redirectToRoute('tecnico_encargado_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tecnico_encargado/new.html.twig', [
            'tecnico_encargado' => $tecnicoEncargado,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'tecnico_encargado_show', methods: ['GET'])]
    public function show(TecnicoEncargado $tecnicoEncargado): Response
    {
        return $this->render('tecnico_encargado/show.html.twig', [
            'tecnico_encargado' => $tecnicoEncargado,
        ]);
    }

    #[Route('/{id}/edit', name: 'tecnico_encargado_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TecnicoEncargado $tecnicoEncargado, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TecnicoEncargadoType::class, $tecnicoEncargado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('tecnico_encargado_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tecnico_encargado/edit.html.twig', [
            'tecnico_encargado' => $tecnicoEncargado,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'tecnico_encargado_delete', methods: ['POST'])]
    public function delete(Request $request, TecnicoEncargado $tecnicoEncargado, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tecnicoEncargado->getId(), $request->request->get('_token'))) {
            $entityManager->remove($tecnicoEncargado);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tecnico_encargado_index', [], Response::HTTP_SEE_OTHER);
    }
}
