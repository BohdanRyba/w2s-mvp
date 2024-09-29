<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;

    public function definition(): array
    {
        return [
            'quantity' => $this->faker->randomNumber(),
            'price' => $this->faker->randomFloat(),
            'price_incl_tax' => $this->faker->randomFloat(),
            'tax_percent' => $this->faker->randomFloat(),
            'discount_amount' => $this->faker->randomFloat(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'order_id' => Order::factory(),
            'product_id' => Product::factory(),
            'store_id' => Store::factory(),
        ];
    }
}
