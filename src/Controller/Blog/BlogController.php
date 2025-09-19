<?php

namespace App\Controller\Blog;

use App\Entity\Blog;
use App\Entity\Topic;
use App\Repository\TopicRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/{slug}', name: 'app_topic_show')]
    public function showTopic(Topic $topic): Response
    {
        return $this->render('blog/topic/show.html.twig', [
            'topic' => $topic,
        ]);
    }
    #[Route('/focus', name: 'app_blog_index')]
    public function index(EntityManagerInterface $entityManager,
                          PaginatorInterface $paginator,
                          TopicRepository $topicRepository,
                          Request $request): Response
    {
        $posts = $paginator->paginate(
            $entityManager->getRepository(Blog::class)->findAllQuery(),
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('blog/index.html.twig', [
            'posts' => $posts,
            'topics' => $topicRepository->findAll(),
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
