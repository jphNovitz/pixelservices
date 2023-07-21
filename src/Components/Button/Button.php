<?php
namespace App\Components\Button;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: 'components/button/Button.html.twig')]
class Button{

    public ?string $path ;
    public ?string $label ;
//    public ?array $parameters = null;
}