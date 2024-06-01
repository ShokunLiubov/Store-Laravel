<?php

namespace App\Enum\User;

use App\Enum\BaseTrait;

enum Role: string
{
    use BaseTrait;
    case USER = 'USER';
    case ADMIN = 'ADMIN';
}
