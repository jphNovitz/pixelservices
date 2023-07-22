<?php

namespace App\Controller\Blog;

use App\Entity\Blog;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/focus', name: 'app_blog_index')]
    public function index(EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request): Response
    {
        $posts = $paginator->paginate(
            $entityManager->getRepository(Blog::class)->findAllQuery(),
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('blog/index.html.twig', [
            'posts' => $posts,
        ]);
    }

    #[Route('/focus-sur/{slug}', name: 'app_blog_show')]
    public function show(Blog $post): Response
    {

        return $this->render('blog/show.html.twig', [
            'post' => $post,
        ]);
    }
}
