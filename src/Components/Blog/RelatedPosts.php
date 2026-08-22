<?php

namespace App\Components\Blog;

use App\Entity\Blog;
use App\Entity\Topic;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: 'components/blog/related-posts.html.twig')]
class RelatedPosts
{
    public int $maxPosts = 4;
    public ?Topic $relatedTopic = null;
    public array $relatedPosts = [];
    public int $topicId = 0;

    public function mount(Blog $post): void
    {
        $currentPostId = $post->getId();
        $this->relatedTopic = $post->getTopic();

        if ($this->relatedTopic === null) {
            return;
        }

        $candidates = $post->getRelatedBlogs()->toArray();
        $this->relatedPosts = array_slice($candidates, 0, $this->maxPosts);

        if ($this->relatedPosts !== []) {
            return;
        }
        $candidates = array_values(array_filter(
            $this->relatedTopic->getArticles()->toArray(),
            fn (Blog $relatedPost) =>
                $relatedPost->getId() !== $currentPostId
                && !empty($relatedPost->getSlug())
                && $relatedPost->isPublished()
        ));

        shuffle($candidates);

        $this->relatedPosts = array_slice($candidates, 0, $this->maxPosts);
    }

}
