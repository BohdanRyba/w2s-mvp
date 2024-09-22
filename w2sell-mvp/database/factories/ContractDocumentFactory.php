<?php

namespace Database\Factories;

use App\Models\Contract;
use App\Models\ContractDocument;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ContractDocumentFactory extends Factory
{
    protected $model = ContractDocument::class;

    public function definition(): array
    {
        return [
            'path' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'contract_id' => Contract::factory(),
        ];
    }
}
