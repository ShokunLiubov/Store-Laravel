<?php

namespace App\Http\Controllers;

use App\Service\CartService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function show(CartService $cartService): View
    {
        $cartProducts = $cartService->getCart();
        $cartSum = $cartService->calcCartSum();
        $cartModal = true;
        $products = [];

        return view('page.public.main',
            compact('cartProducts', 'cartModal', 'products', 'cartSum'));
    }
}
