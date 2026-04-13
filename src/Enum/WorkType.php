<?php

namespace App\Enum;

enum WorkType: string
{
    case Create      = 'creation';
    case Evolution = 'evolution';
    case Project    = 'projet';

    public function label(): string
    {
        return match($this) {
            self::Create  => 'Création de site',
            self::Evolution => 'Refonte & évolution',
            self::Project    => 'Projet sur mesure',
        };
    }
}
