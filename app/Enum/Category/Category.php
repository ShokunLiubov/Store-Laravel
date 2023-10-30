<?php

namespace App\Enum\Category;

enum Category: int {
    case PERFUMERY = 0;
    case HAIR = 1;
    case FACE = 2;
    case MAKEUP = 3;
    case TO_MEN = 4;
    case HEALTH_AND_CARE = 5;
    case GIFTS = 6;
    case CLOTHES = 7;

    public function toString()
    {
        return match($this) {
            self::PERFUMERY => 'Perfumery',
            self::HAIR => 'Hair',
            self::FACE => 'Fase',
            self::MAKEUP => 'Makeup',
            self::TO_MEN => 'To men',
            self::HEALTH_AND_CARE => 'Health & Care',
            self::GIFTS => 'Gifts',
            self::CLOTHES => 'Clothes',
            default => throw new \Exception('Unexpected match value')

        };
    }
}
