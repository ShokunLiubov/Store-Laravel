<?php

namespace Database\Factories;

use App\Enum\Order\OrderStatus;
use App\Models\Delivery;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $index = count(OrderStatus::values()) - 1;
        $status = OrderStatus::values()[mt_rand(0, $index)];
        $total = 0;

        return [
            'status' => $status,
            'user_id' => User::query()->inRandomOrder()->firstOrFail()->id,
            'total' => $total,
            'delivery_id' => Delivery::query()->inRandomOrder()->firstOrFail()->id,
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'address' => fake()->address()
        ];
    }
}
