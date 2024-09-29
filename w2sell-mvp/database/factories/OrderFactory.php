<?php

namespace Database\Factories;

use App\Models\BillingAddress;
use App\Models\Order;
use App\Models\ShippingAddress;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'subtotal' => $this->faker->randomFloat(),
            'tax_amount' => $this->faker->randomFloat(),
            'discount_amount' => $this->faker->randomFloat(),
            'grand_total' => $this->faker->randomFloat(),
            'status' => $this->faker->word(),
            'coupon_code' => $this->faker->word(),
            'payment_method' => $this->faker->word(),
            'is_paid' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
            'shipping_address_id' => ShippingAddress::factory(),
            'billing_address_id' => BillingAddress::factory(),
        ];
    }
}
