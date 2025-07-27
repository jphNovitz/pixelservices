<?php

namespace App\Controller\Blog;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class RedirectController extends AbstractController
{
//    /**
//     * Redirection de l'ancien article pilier vers le nouveau
//     */
//    #[Route('/developpeur-web-brabant-wallon-comment-choisir', name: 'redirect_old_pillar')]
//    public function redirectOldPillar(): RedirectResponse
//    {
//        return $this->redirectToRoute('article_show', [
//            'slug' => 'creation-site-web-brabant-wallon-guide-complet'
//        ], 301);
//    }


//    #[Route('/ancien-article-1', name: 'redirect_article_1')]
//    public function redirectArticle1(): RedirectResponse
//    {
//        return $this->redirectToRoute('article_show', [
//            'slug' => 'nouveau-article-1'
//        ], 301);
//    }

//    #[Route('/topic/developpeur-web-en-brabant-wallon-comment-choisir-le-bon-partenaire-pour-votre-projet', name:"redirect_topic_01")]
//    public function redirectTopic01(): RedirectResponse
//    {
//        return $this->redirectToRoute('app_topic_show', [
//            'slug' => 'developpeur-web-local-brabant-wallon-le-guide-2025'
//        ], 301);
//    }

//    /**
//     * Redirection avec paramètres dynamiques
//     */
//    #[Route('/old-category/{slug}', name: 'redirect_old_category')]
//    public function redirectOldCategory(string $slug): RedirectResponse
//    {
//        return $this->redirectToRoute('new_category', [
//            'slug' => $slug
//        ], 301);
//    }

//    /**
//     * Redirection vers une URL externe
//     */
//    #[Route('/vers-externe', name: 'redirect_external')]
//    public function redirectExternal(): RedirectResponse
//    {
//        return $this->redirect('https://exemple.com/nouvelle-page', 301);
//    }

//    /**
//     * Redirection groupée avec logique
//     */
//    #[Route('/blog/{year}/{slug}', name: 'redirect_old_blog', requirements: ['year' => '\d{4}'])]
//    public function redirectOldBlog(int $year, string $slug): RedirectResponse
//    {
//        // Logique personnalisée si nécessaire
//        if ($year < 2020) {
//            return $this->redirectToRoute('archive', ['slug' => $slug], 301);
//        }
//
//        return $this->redirectToRoute('article_show', ['slug' => $slug], 301);
//    }
}