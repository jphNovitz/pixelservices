<?php

namespace App\Controller\Work;

use App\Entity\Work;
use App\Repository\WorkRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WorkController extends AbstractController
{
    #[Route('/services', name: 'app.works.list')]
    public function index(WorkRepository $workRepository): Response
    {
        return $this->render('work/index.html.twig', [
            'works' => $workRepository->findAll(),
        ]);
    }

    #[Route('/service/{slug}', name: 'app.works.show')]
    public function show(WorkRepository $workRepository, String $slug): Response
    {

        return $this->render('work/show.html.twig', [
            'work' => $workRepository->findOne($slug),
        ]);
    }

}
