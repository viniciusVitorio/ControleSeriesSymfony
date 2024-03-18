<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeriesController extends AbstractController
{
    #[Route('/series')]
    public function index(): Response
    {
        $seriesList = [
            'Doctor Who',
            'Sherlock',
            'The Office'
        ];

        return $this->render('series/seriesList.html.twig', [
            'seriesList' => $seriesList,
        ]);
    }

    #[Route('series/add')]
    public function seriesAddForm(): Response
    {

        return $this->render('series/seriesAddForm.html.twig');
    }
}
