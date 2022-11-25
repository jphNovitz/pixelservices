<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\MessageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('', name: 'app_home')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {

        $message = new Message();
        $message->setSeen(false);

        $form = $this->createForm(MessageType::class, $message);

        $form->handleRequest($request);

        // dd($form->isValid());
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($message);
            $em->flush();

            $this->addFlash('success', 'Your message have been send');
            return $this->redirectToRoute('app_home');
        }

        $response = $this->render('home/index.html.twig', [
            'form' => $form->createView(),
        ]);

        // // cache publicly for 3600 seconds
        // $response->setPublic();
        // $response->setMaxAge(3600);
        // use this method to set several cache settings in one call
        // (this example lists all the available cache settings)
        $response->setCache([
            'must_revalidate'  => false,
            'no_cache'         => false,
            'no_store'         => false,
            'no_transform'     => false,
            'public'           => true,
            'private'          => false,
            'proxy_revalidate' => false,
            'max_age'          => 6000,
            's_maxage'         => 6000,
            'immutable'        => true,
            'last_modified'    => new \DateTime(),
            'etag'             => 'abcdef'
        ]);

        // (optional) set a custom Cache-Control directive
        $response->headers->addCacheControlDirective('must-revalidate', true);

        return $response;

        // return $this->render('home/index.html.twig', [
        //     'form' => $form->createView(),
        // ]);
    }
}
