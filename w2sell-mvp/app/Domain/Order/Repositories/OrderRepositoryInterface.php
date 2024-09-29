<?php

namespace App\Domain\Order\Repositories;

use App\Models\CartItem;
use App\Models\Order;

interface OrderRepositoryInterface
{
    /**
     * @param array $data
     * @return Order
     */
    public function create(array $data): Order;

    /**
     * @param array $data
     * @return Order
     */
    public function createOrder(array $data): Order;

    /**
     * @param Order $order
     * @param CartItem $cartItem
     * @return void
     */
    public function addItemToOrder(Order $order, CartItem $cartItem): void;

    /**
     * @param Order $order
     * @param array $items
     * @return void
     */
    public function addOrderItems(Order $order, array $items): void;

}
