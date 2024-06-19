<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Service\CartService;
use Illuminate\Http\JsonResponse;

class CartController extends Controller
{
    public function __construct(protected CartService $cartService)
    {
    }

    public function show(): JsonResponse
    {
        return response()->json([
            'cartModal' => true,
            'cart' => $this->cartService->getCart(),
            'cartSum' => $this->cartService->calcCartSum()
        ]);
    }

    public function hide(): JsonResponse
    {
        return response()->json(['cartModal' => false]);
    }

    public function add(Product $product): JsonResponse
    {
        $cart = $this->cartService->getCart();
        $exist = in_array($product['id'], array_column($cart, 'id'));

        if ($exist) {
            $this->increment($product);
        } elseif ($product['quantity'] > 0) {
            $product['count'] = 1;
            $cart[] = $product;
        }

        session(['cart' => $cart]);

        return response()->json();
    }

    public function increment(Product $product): JsonResponse
    {
        $cart = $this->cartService->getCart();
        $error = null;

        foreach ($cart as &$item) {
            if ($item['id'] === $product['id']) {
                if ($item['quantity'] > $item['count']) {
                    $item['count'] += 1;
                    session(['cart' => $cart]);
                } else {
                    $error = ['message' => 'No more products in stock!', 'product_id' => $product['id']];
                }
                break;
            }
        }

        return response()->json(['cart' => $cart, 'cartSum' => $this->cartService->calcCartSum(), 'error' => $error]);
    }

    public function decrement(Product $product): JsonResponse
    {
        $cart = $this->cartService->getCart();

        foreach ($cart as $item) {
            if ($item['id'] === $product['id']) {
                if ($item['count'] === 1) {

                    return $this->remove($product);
                }

                $item['count'] -= 1;
            }
        }

        session(['cart' => $cart]);

        return response()->json(['cart' => $cart, 'cartSum' => $this->cartService->calcCartSum()]);
    }

    public function remove(Product $product): JsonResponse
    {
        $cart = collect($this->cartService->getCart());

        $cart = $cart->reject(function ($item) use ($product) {
            return $item['id'] === $product['id'];
        });

        session(['cart' => $cart->toArray()]);

        return response()->json([
            'cart' => $cart->toArray(),
            'cartSum' => $this->cartService->calcCartSum()
        ]);
    }
}
