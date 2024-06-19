<?php

namespace App\Service;

class CartService extends Service
{
    public function getCart(): array
    {
        if (!session('cart')) {
            session(['cart' => []]);
        }

        return session('cart');
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
