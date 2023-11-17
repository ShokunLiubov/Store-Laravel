<?php

namespace App\Service;

use Illuminate\Support\Facades\Session;

class CartService
{
    public function getCart(): array
    {
        return Session::get('cart') ?? [];
    }

    public function calcCartSum(): int
    {
        $sum = 0;
        foreach ($this->getCart() as $item) {
            $sum+= $item->price * $item->count;
        }

        return $sum;
    }
}
