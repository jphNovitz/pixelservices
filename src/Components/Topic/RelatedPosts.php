<?php

namespace App\Components\Topic;

use App\Entity\Topic;
use App\Repository\BlogRepository;
use App\Repository\TopicRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: 'components/Topic/RelatedPosts.html.twig')]
class RelatedPosts
{
    public ?Topic $topic = null;
    public array $relatedPosts = [];
    public Topic|null $parentTopic = null;
    public array $childrenTopics = [];
    public int $topicId = 0;

    public function __construct(
        private BlogRepository  $blogRepository,
        private TopicRepository $topicRepository)
    {
    }

    public function mount(int $topicId): void
    {
        $this->relatedPosts = $this->blogRepository->findBy(['topic' => $topicId]);
        $topic = $this->topicRepository->findOneBy(['id' => $topicId]);
        $this->topic = $topic;
        $this->parentTopic= $topic->getParentTopic();
        $this->childrenTopics= $topic->getChildrenTopics()->toArray();
    }

}
