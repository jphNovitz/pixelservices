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
        foreach ($workRepository->findAll() as $item){
            if ($item['front']) $works['front'][]=$item ;
                else $works['general'][]=$item ;
        }
//        dd($works);
        return $this->render('work/index.html.twig', [
            'works' => $works,
        ]);
    }

    #[Route('/service/{slug}', name: 'app.works.show')]
    public function show(?Work $work): Response
    {

        return $this->render('work/show.html.twig', [
            'work' => $work,
        ]);
    }

}
