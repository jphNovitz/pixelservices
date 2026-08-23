<?php

namespace App\Components\Topic;

use App\Entity\Blog;
use App\Entity\Topic;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: 'components/Topic/RelatedPosts.html.twig')]
class RelatedPosts
{
    public array $relatedPosts = [];
    public ?Topic $parentTopic = null;
    public array $childrenTopics = [];
    public int $maxPosts = 4;
    public int $maxChildrenTopics = 1;

    public function mount(Topic $topic): void
    {
        $parent = $topic->getParentTopic();
        $this->parentTopic = $parent !== null
        && $parent->isPublished()
        && !empty($parent->getSlug())
            ? $parent
            : null;

        $candidatesTopic = array_values(array_filter(
            $topic->getChildrenTopics()->toArray(),
            fn (Topic $childTopic) =>
                !empty($childTopic->getSlug())
                && $childTopic->isPublished()
        ));

        if ($candidatesTopic !== []) {
            shuffle($candidatesTopic);
            $this->childrenTopics = array_slice($candidatesTopic, 0, $this->maxChildrenTopics);
        }

        $maxPosts = $this->maxPosts
            - (int) ($this->parentTopic !== null)
            - count($this->childrenTopics);

        $candidates = array_values(array_filter(
            $topic->getRelatedBlogs()->toArray(),
            fn (Blog $relatedPost) =>
                !empty($relatedPost->getSlug())
                && $relatedPost->isPublished()
        ));
        $this->relatedPosts = array_slice($candidates, 0, $maxPosts);

        if ($this->relatedPosts !== []) {
            return;
        }

        $candidates = array_values(array_filter(
            $topic->getArticles()->toArray(),
            fn (Blog $relatedPost) =>
                !empty($relatedPost->getSlug())
                && $relatedPost->isPublished()
        ));

        shuffle($candidates);

        $this->relatedPosts = array_slice($candidates, 0, $maxPosts);
    }
}
