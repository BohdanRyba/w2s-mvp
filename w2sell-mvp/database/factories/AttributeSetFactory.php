<?php

namespace Database\Factories;

use App\Models\AttributeSet;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AttributeSetFactory extends Factory
{
    protected $model = AttributeSet::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
