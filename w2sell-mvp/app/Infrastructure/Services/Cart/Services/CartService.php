<?php

namespace App\Infrastructure\Services\Cart\Services;

use App\Domain\Cart\Repositories\CartRepositoryInterface;
use App\Domain\Cart\Services\CartServiceInterface;
use App\Domain\Product\Repositories\ProductRepositoryInterface;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\DB;

class CartService implements CartServiceInterface
{
    public function __construct(private readonly CartRepositoryInterface $cartRepository, private readonly ProductRepositoryInterface $productRepository)
    {
    }

    public function viewCart(int $userId): Cart
    {
        $cart = $this->cartRepository->getUserCart($userId);
        return $cart->load('items.product.store');
    }

    public function addShippingAddress(int $userId, array $addressData): bool
    {
        $cart = $this->cartRepository->getUserCart($userId);
        $address = ShippingAddress::create($addressData);
        return $cart->update([
            'shipping_address_id' => $address->id
        ]);
    }

    public function addToCart(int $userId, array $data): bool
    {
        return DB::transaction(function () use ($userId, $data) {
            $cart = $this->cartRepository->getUserCart($userId);
            $product = Product::with('store')->findOrFail($data['product_id']);
            $this->cartRepository->addItem(cartId: $cart->id, item: [
                'product_id' => $product->id,
                'quantity' => $data['quantity'],
                'store_id' => $product->store_id,
                'price' => $product->price
            ]);

        });
    }

    public function updateCartItem($userId, $itemId, $data): Cart
    {
        return DB::transaction(function () use ($userId, $itemId, $data) {
            $cart = $this->cartRepository->getUserCart($userId);
            $this->cartRepository->updateItem($itemId, $data);
            return $cart->load('items');
        });
    }

    public function deleteCartItem($userId, $itemId): Cart
    {
        return DB::transaction(function () use ($userId, $itemId) {
            $cart = $this->cartRepository->getUserCart($userId);
            $this->cartRepository->removeItem($itemId);
            return $cart->load('items');
        });
    }
}
