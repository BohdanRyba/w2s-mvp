<?php

namespace Database\Factories;

use App\Models\CustomizableOption;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CustomizableOptionFactory extends Factory
{
    protected $model = CustomizableOption::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'type' => $this->faker->word(),
            'is_required' => $this->faker->boolean(),
            'options' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'product_id' => Product::factory(),
        ];
    }
}
