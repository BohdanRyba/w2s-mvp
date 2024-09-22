<?php

namespace Database\Factories;

use App\Models\TaxClass;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TaxClassFactory extends Factory
{
    protected $model = TaxClass::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'tax_rate' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
