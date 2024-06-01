<?php

namespace Database\Factories;

use App\Enum\Order\DeliveryType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery>
 */
class DeliveryFactory extends Factory
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

    public static function createDeliveries(): void
    {
        foreach (DeliveryType::values() as $type) {
            self::new()->create([
                'delivery_type' => $type,
                'price' => mt_rand(100, 200)
            ]);
        }
    }
}
