<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->words(3, true);

        return [
            'title' => $title,
            'slug' => Str::slug($title, '-'),
            'price' => mt_rand(100, 1000),
            'quantity' => mt_rand(1, 10),
            'image' => fake()->imageUrl(),
            'description' => fake()->text(),
            'made' => fake()->country()
        ];
    }
}
