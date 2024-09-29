<?php

namespace Database\Factories;

use App\Models\BillingAddress;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class CartFactory extends Factory
{
    protected $model = Cart::class;

    public function definition(): array
    {
        return [
            'guest_token' => Str::random(10),
            'currency_code' => $this->faker->word(),
            'subtotal' => $this->faker->randomFloat(),
            'tax_amount' => $this->faker->randomFloat(),
            'discount_amount' => $this->faker->randomFloat(),
            'grand_total' => $this->faker->randomFloat(),
            'is_guest' => $this->faker->boolean(),
            'coupon_code' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
            'billing_address_id' => BillingAddress::factory(),
        ];
    }
}
