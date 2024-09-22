<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'image' => $this->faker->word(),
            'is_active' => $this->faker->boolean(),
            'is_shown' => $this->faker->boolean(),
            'meta_title' => $this->faker->word(),
            'meta_keywords' => $this->faker->word(),
            'meta_description' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'store_id' => Store::factory(),
            'parent_id' => Category::factory(),
        ];
    }
}
