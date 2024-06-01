<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
    }

    public static function createOrderItems(): void
    {
        $orders = Order::query()->get();

        foreach ($orders as $order) {
            $total = 0;

            for ($i = 0; $i <= mt_rand(1, 5); $i++) {
                $product = Product::query()->inRandomOrder()->firstOrFail();
                $quantity = mt_rand(1, 5);
                $price = $product->price * $quantity;
                $total += $price;

                self::new()->create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'price' => $price,
                    'quantity' => $quantity
                ]);
            }

            Order::query()
                ->where(['id' => $order->id])
                ->update(['total' => $total]);
        }
    }
}
