<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\ShippingAddress;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ShippingAddressFactory extends Factory
{
    protected $model = ShippingAddress::class;

    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'street' => $this->faker->streetName(),
            'city' => $this->faker->city(),
            'postcode' => $this->faker->postcode(),
            'region' => $this->faker->word(),
            'country_code' => $this->faker->word(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'cart_id' => Cart::factory(),
        ];
    }
}
