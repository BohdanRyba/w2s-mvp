<?php

namespace Database\Factories;

use App\Models\Contract;
use App\Models\ContractParticipant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ContractParticipantFactory extends Factory
{
    protected $model = ContractParticipant::class;

    public function definition(): array
    {
        return [
            'role' => $this->faker->word(),
            'status' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'contract_id' => Contract::factory(),
            'user_id' => User::factory(),
        ];
    }
}
