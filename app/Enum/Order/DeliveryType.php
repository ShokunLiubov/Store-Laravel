<?php

namespace App\Enum\Order;

use App\Enum\BaseTrait;

enum DeliveryType : string
{
    use BaseTrait;
    case POSTAL = 'Postal';
    case COURIER = 'Courier';
}
