<?php

namespace App\Controller;

use App\Entity\Series;
use App\Repository\SeriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeriesController extends AbstractController
{
    public function __construct(private SeriesRepository $seriesRepository)
    {
    }

    #[Route('/series')]
    public function index(): Response
    {
        $seriesList = $this->seriesRepository->findAll();

        return $this->render('series/seriesList.html.twig', [
            'seriesList' => $seriesList,
        ]);
    }

    #[Route('/series/add', methods: ['GET'])]
    public function addSeriesForm(): Response
    {
        return $this->render('series/seriesAddForm.html.twig');
    }

    #[Route('/series/add', methods: ['POST'])]
    public function addSeries(Request $request): Response
    {
        $seriesName = $request->request->get('name');

        $series = new Series($seriesName);

        $this->seriesRepository->add($series, true);
        return new RedirectResponse('/series');
    }
}
