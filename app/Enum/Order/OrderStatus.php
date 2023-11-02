<?php

namespace App\Enum\Order;

use App\Enum\BaseTrait;

enum OrderStatus: string
{
    use BaseTrait;

    case PENDING = 'PENDING';
    case PAYED = 'PAYED';
    case SHIPPED = 'SHIPPED';
    case DELIVERED = 'DELIVERED';
}
