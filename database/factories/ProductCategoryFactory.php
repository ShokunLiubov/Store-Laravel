<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCategory>
 */
class ProductCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryId = Category::query()->inRandomOrder()->firstOrFail()->id;
        $productId = Product::query()->inRandomOrder()->firstOrFail()->id;

        $exists = ProductCategory::query()
            ->where('product_id', $productId)
            ->where('category_id', $categoryId)
            ->exists();

        if ($exists) {
            return [];
        }

        return [
            'product_id' => $productId,
            'category_id' => $categoryId
        ];
    }

    public static function createProductCategory(): void
    {
        $products = Product::query()->get();

        foreach ($products as $product) {
            for ($i = 0; $i <= mt_rand(1, 3); $i++) {
                $categoryId = Category::query()->inRandomOrder()->firstOrFail()->id;

                $exists = ProductCategory::query()
                    ->where('product_id', $product->id)
                    ->where('category_id', $categoryId)
                    ->exists();

                if ($exists) {
                    continue;
                }

                self::new()->create([
                    'product_id' => $product->id,
                    'category_id' => $categoryId
                ]);
            }
        }
    }
}
