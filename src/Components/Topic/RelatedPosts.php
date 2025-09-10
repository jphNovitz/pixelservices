<?php

namespace App\Components\Topic;

use App\Entity\Topic;
use App\Repository\BlogRepository;
use App\Repository\TopicRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: 'components/Topic/RelatedPosts.html.twig')]
class RelatedPosts
{
    public array $relatedPosts = [];
    public int $topicId = 0;
    public function __construct(private BlogRepository $blogRepository)
    {
    }

    public function mount(int $topicId): void
    {
        $this->relatedPosts = $this->blogRepository->findBy(['topic' => $topicId]);
    }

}