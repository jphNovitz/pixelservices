<?php

namespace App\Components\Blog;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: 'components/blog/Article.html.twig')]
class Article
{
    public ?string $image_url = "";
    public ?string $image_alt = "";
    public string $title = "";
    public string $content = "";

}