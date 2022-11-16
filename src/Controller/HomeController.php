<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\MessageType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request): Response
    {

        $message = new Message();
        $message->setSeen(false);

        $form = $this->createForm(MessageType::class, $message);

        $form->handleRequest($request);

        // dd($form->isValid());
        if ($form->isSubmitted() && $form->isValid()){
            die('ok');
        }


        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
