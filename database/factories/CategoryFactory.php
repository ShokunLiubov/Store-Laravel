<?php

namespace Database\Factories;

use App\Enum\Category\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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

    public static function createCategories(): void
    {
        foreach (Category::values() as $category) {
            self::new()->create([
                'name' => $category,
                'slug' => Str::slug($category, '-')
            ]);
        }
    }
}
