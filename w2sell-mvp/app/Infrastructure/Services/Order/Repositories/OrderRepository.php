<?php

namespace App\Infrastructure\Services\Order\Repositories;

use App\Domain\Order\Repositories\OrderRepositoryInterface;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;

class OrderRepository implements OrderRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function addItemToOrder(Order $order, CartItem $cartItem): void
    {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $cartItem->product_id,
            'store_id' => $cartItem->store_id,
            'quantity' => $cartItem->quantity,
            'price' => $cartItem->price,
            'price_incl_tax' => $cartItem->price_incl_tax,
            'tax_percent' => $cartItem->tax_percent,
            'discount_amount' => $cartItem->discount_amount,
        ]);
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): Order
    {
        return Order::create($data);
    }
    /**
     * @inheritDoc
     */
    public function createOrder(array $data): Order
    {
        return $this->create($data);
    }

    public function addOrderItems(Order $order, array $items): void
    {
        foreach ($items as $item) {
            OrderItem::create([
                'order_id'        => $order->id,
                'product_id'      => $item['product_id'],
                'store_id'        => $item['store_id'],
                'quantity'        => $item['quantity'],
                'price'           => $item['price'],
                'price_incl_tax'  => $item['price_incl_tax'],
                'tax_percent'     => $item['tax_percent'],
                'discount_amount' => $item['discount_amount'],
            ]);
        }
    }
}
