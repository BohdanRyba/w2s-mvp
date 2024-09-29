<?php

namespace App\Domain\Cart\Repositories;

use App\Models\Cart;

interface CartRepositoryInterface
{
    public function getUserCart(int $userId): Cart;

    /**
     * @param int $cartId
     * @return Cart
     */
    public function findById(int $cartId): Cart;

    /**
     * @param Cart $cart
     * @return bool
     */
    public function clear(Cart $cart): bool;

    /**
     * @param int $cartId
     * @param array $item
     * @return void
     */
    public function addItem(int $cartId, array $item): void;

    /**
     * @param int $itemId
     * @param array $itemData
     * @return void
     */
    public function updateItem(int $itemId, array $itemData): void;

    /**
     * @param int $itemId
     * @return void
     */
    public function removeItem(int $itemId): void;
}
