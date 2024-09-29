<?php

namespace App\Domain\Cart\Services;

use App\Models\Cart;

interface CartServiceInterface
{
    /**
     * @param int $userId
     * @param array $data
     * @return bool
     */
    public function addToCart(int $userId, array $data): bool;

    /**
     * @param int $userId
     * @return Cart
     */
    public function viewCart(int $userId): Cart;

    /**
     * @param int $userId
     * @param array $addressData
     * @return bool
     */
    public function addShippingAddress(int $userId, array $addressData): bool;

    /**
     * @param $userId
     * @param $itemId
     * @param $data
     * @return mixed
     */
    public function updateCartItem($userId, $itemId, $data): Cart;

    /**
     * @param $userId
     * @param $itemId
     * @return mixed
     */
    public function deleteCartItem($userId, $itemId): Cart;
}
