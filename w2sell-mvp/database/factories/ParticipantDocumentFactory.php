<?php

namespace Database\Factories;

use App\Models\ContractParticipant;
use App\Models\ParticipantDocument;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ParticipantDocumentFactory extends Factory
{
    protected $model = ParticipantDocument::class;

    public function definition(): array
    {
        return [
            'path' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'contract_participant_id' => ContractParticipant::factory(),
        ];
    }
}
