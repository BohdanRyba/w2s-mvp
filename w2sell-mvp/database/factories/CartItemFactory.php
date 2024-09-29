<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CartItemFactory extends Factory
{
    protected $model = CartItem::class;

    public function definition(): array
    {
        return [
            'quantity' => $this->faker->randomNumber(),
            'price' => $this->faker->randomFloat(),
            'price_incl_tax' => $this->faker->randomFloat(),
            'discount_amount' => $this->faker->randomFloat(),
            'coupon_code' => $this->faker->word(),
            'product_options' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'cart_id' => Cart::factory(),
            'store_id' => Store::factory(),
            'product_id' => Product::factory(),
        ];
    }
}
