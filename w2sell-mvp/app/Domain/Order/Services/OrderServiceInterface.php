<?php

namespace App\Domain\Order\Services;

use App\Models\Order;

interface OrderServiceInterface
{
    /**
     * @param int $cartId
     * @return Order
     */
    public function createOrderFromCart(int $cartId): Order;

    /**
     * @param int $userId
     * @return Order
     */
    public function checkout(int $userId): Order;

}
