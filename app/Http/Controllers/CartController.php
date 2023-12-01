<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Service\CartService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function __construct(protected CartService $cartService)
    {
    }

    public function show(): JsonResponse
    {
        $cart = $this->cartService->getCart();
        $cartSum = $this->cartService->calcCartSum();

        return response()->json(['cartModal' => true, 'cart' => $cart, 'cartSum' => $cartSum]);
    }

    public function hide(): JsonResponse
    {
        return response()->json(['cartModal' => false]);
    }

    public function add(Product $product): JsonResponse
    {
        $cart = $this->cartService->getCart();
        $exist = $this->cartService->existProductInCart($product['id']);

        if ($exist) {
            $this->increment($product);
        } elseif ($product['quantity'] > 0) {
            $product['count'] = 1;
            $cart[] = $product;
        }

        session(['cart' => $cart]);
        return response()->json();
    }

    /**
     * @throws Exception
     */
    public function increment(Product $product): JsonResponse
    {
        $cart = $this->cartService->getCart();

        foreach ($cart as $item) {

            if ($item['id'] === $product['id']) {

                if ($item['quantity'] > $item['count']) {
                    $item['count'] += 1;
                    session(['cart' => $cart]);
                    $cartSum = $this->cartService->calcCartSum();
                    return response()->json(['cart' => $cart, 'cartSum' => $cartSum]);
                } else {
                    throw new Exception('All in stock ' . $product['count']);
                }
            }
        }
        return response()->json(['cart' => $cart]);
    }

    public function decrement(Product $product): JsonResponse
    {
        $cart = $this->cartService->getCart();

        foreach ($cart as $item) {
            if ($item['id'] === $product['id']) {
                if ($item['count'] != 1) {
                    $item['count'] -= 1;
                    session(['cart' => $cart]);
                    $cartSum = $this->cartService->calcCartSum();
                    return response()->json(['cart' => $cart, 'cartSum' => $cartSum]);
                }

                $this->remove($product);
            }
        }
        return response()->json(['cart' => $cart]);
    }

    public function remove(Product $product): JsonResponse
    {
        $cart = $this->cartService->getCart();

        foreach ($cart as $key => $value) {

            if ($value['id'] == $product['id']) {
                    array_splice($cart, $key, 1);
                    session(['cart' => $cart]);
                    $cartSum = $this->cartService->calcCartSum();
                    return response()->json(['cart' => $cart, 'cartSum' => $cartSum]);
            }
        }
        return response()->json(['cart' => $cart]);
    }
}
