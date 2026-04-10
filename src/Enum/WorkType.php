<?php

namespace App\Enum;

enum WorkType: string
{
    case Zero      = 'zero';
    case Evolution = 'evolution';
    case Projet    = 'projet';

    public function label(): string
    {
        return match($this) {
            self::Zero      => 'Partir de zéro',
            self::Evolution => 'Faire évoluer',
            self::Projet    => 'Projet défini',
        };
    }
}
