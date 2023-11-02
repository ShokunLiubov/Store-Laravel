<?php

namespace App\Enum\Category;

use App\Enum\BaseTrait;

enum Category: string {

    use BaseTrait;

    case PERFUMERY = 'Perfumery';
    case HAIR = 'Hair';
    case FACE = 'Fase';
    case MAKEUP = 'Makeup';
    case TO_MEN = 'To men';
    case HEALTH_AND_CARE = 'Health & Care';
    case GIFTS = 'Gifts';
    case CLOTHES = 'Clothes';
}
