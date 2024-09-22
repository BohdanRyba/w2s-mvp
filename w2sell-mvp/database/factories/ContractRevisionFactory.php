<?php

namespace Database\Factories;

use App\Models\Contract;
use App\Models\ContractRevision;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ContractRevisionFactory extends Factory
{
    protected $model = ContractRevision::class;

    public function definition(): array
    {
        return [
            'description' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'contract_id' => Contract::factory(),
        ];
    }
}
