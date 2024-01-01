<?php

namespace App\Service;

use Illuminate\Support\Facades\Session;

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

    public function existProductInCart(int $id): bool
    {
        foreach ($this->getCart() as $product) {
            if($product['id'] === $id) {
                return true;
            }
        }
        return false;
    }
}
