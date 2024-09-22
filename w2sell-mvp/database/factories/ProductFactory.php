<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $faker = $this->faker;
        return [
            'title' => $faker->word(),
            'short_description' => $faker->text(),
            'description' => $faker->paragraph(),
            'price' => $faker->randomFloat(2, 10, 1000), // Price between 10 and 1000
            'stock' => $faker->randomNumber(),
            'stock_treshhold' => $faker->numberBetween(1, 100), // Example threshold value
            'weight' => $faker->randomFloat(2, 1, 100), // Weight between 1 and 100 units
            'lenght' => $faker->randomFloat(2, 1, 100), // Length between 1 and 100 units
            'width' => $faker->randomFloat(2, 1, 100), // Width between 1 and 100 units
            'height' => $faker->randomFloat(2, 1, 100), // Height between 1 and 100 units
            'size_unit_type' => $faker->randomElement(['cm', 'inches', 'mm']), // Example unit types
            'weight_unit_type' => $faker->randomElement(['kg', 'lbs', 'g']),
            'options' => json_encode($faker->words(5)), // Simulating product options
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => null, // Assuming soft deletes are used
            'attribute_set_id' => $faker->numberBetween(1, 10),
            'sku' => strtoupper($faker->unique()->lexify('SKU-?????')), // Random unique SKU
            'tax_class_id' => $faker->numberBetween(1, 5), // Example tax class range
            'url_key' => $faker->slug(),
            'meta_title' => $faker->sentence(),
            'meta_keywords' => implode(',', $faker->words(5)), // Simulate meta keywords
            'meta_description' => $faker->sentence(),
            'is_downloadable' => $faker->boolean(),
            'downloadable_link' => $faker->url(), // Only if downloadable is true
            'gift_options' => json_encode([
                'message' => $faker->sentence(),
                'wrapping' => $faker->boolean(),
                'price' => $faker->randomFloat(2, 1, 20),
            ]),
            'is_configurable' => $faker->boolean(),
            'parent_id' => $faker->optional()->numberBetween(1, 50), // Simulate parent-child products
            'dropshipper_link' => $faker->optional()->url(), // Simulate optional link
            'wholeseller_link' => $faker->optional()->url(), // Simulate optional link
            'category_id' => Category::factory(),
            'store_id' => Store::factory(),
        ];
    }
}
