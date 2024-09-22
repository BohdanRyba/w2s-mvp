<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    public function definition(): array
    {
        return [
            'image' => $this->faker->word(),
            'bg_image' => $this->faker->word(),
            'country' => $this->faker->country(),
            'language' => $this->faker->word(),
            'contact' => $this->faker->word(),
            'messanger' => $this->faker->word(),
            'state' => $this->faker->word(),
            'zip' => $this->faker->word(),
            'timezone' => $this->faker->word(),
            'currency' => $this->faker->word(),
            'address' => $this->faker->word(),
            'address1' => $this->faker->word(),
            'email' => $this->faker->unique()->safeEmail(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
        ];
    }
}
