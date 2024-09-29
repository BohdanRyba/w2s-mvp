<?php

namespace App\Infrastructure\Services\Cart\Repositories;

use App\Domain\Cart\Repositories\CartRepositoryInterface;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\DB;

class CartRepository implements CartRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function findById(int $cartId): Cart
    {
        return Cart::find($cartId);
    }

    /**
     * @inheritDoc
     */
    public function clear(Cart $cart): bool
    {
        $cart->items()->delete();
        return $cart->delete();
    }

    public function clearCart(int $cartId): bool
    {
        CartItem::where('cart_id', $cartId)->delete();
        return Cart::destroy($cartId);
    }

    public function getUserCart(int $userId): Cart
    {
        return Cart::firstOrCreate(['user_id' => $userId]);
    }

    public function addItem(int $cartId, array $item): void
    {
        CartItem::updateOrCreate(
            [
                'cart_id' => $cartId,
                'product_id' => $item['product_id'],
            ],
            [
                'quantity' => DB::raw('quantity + ' . $item['quantity']),
                'store_id' => $item['store_id'],
                'price' => $item['price']
            ]);
    }

    public function updateItem(int $itemId, array $itemData): void
    {
        CartItem::where('id' , $itemId)->update($itemData);
    }

    public function removeItem(int $itemId): void
    {
        CartItem::where('id' , $itemId)->delete();
    }
}
