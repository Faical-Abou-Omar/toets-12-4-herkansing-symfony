<?php

// src/Controller/ProductController.php
namespace App\Controller;

use App\Entity\Genre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// ...

class ProductController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(): Response
    {
        return $this->render('index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    #[Route('/insert', name: 'app_insert')]
    public function insert(): Response
    {
        return $this->render('insert.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
    #[Route('/Genre/{id}', name: 'Genre_show')]
    public function show(EntityManagerInterface $entityManager, int $id): Response
    {
    $Genre = $entityManager->getRepository(Genre::class)->find($id);

    if (!$Genre) {
    throw $this->createNotFoundException(
    'No Genre found for id '.$id
    );
    }

    return $this->render('Genre.html.twig', ['Genre' => $Genre]);

    }
    }