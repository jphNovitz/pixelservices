<?php

namespace App\Components\Blog;

use App\Entity\Topic;
use App\Repository\TopicRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: 'components/blog/related-posts.html.twig')]
class RelatedPosts
{
    public ?Topic $relatedTopic = null;
    public array $relatedPosts = [];
    public int $topicId = 0;
    public int  $currentPostId = 0;

    public function __construct(private TopicRepository $topicRepository)
    {
    }

    public function mount(int $topicId): void
    {
        $this->relatedTopic = $this->topicRepository->findOneBy(['id' => $topicId]);
    }

}