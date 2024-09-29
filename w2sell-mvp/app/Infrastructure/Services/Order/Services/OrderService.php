<?php

namespace App\Infrastructure\Services\Order\Services;

use App\Domain\Cart\Repositories\CartRepositoryInterface;
use App\Domain\Order\Repositories\OrderRepositoryInterface;
use App\Domain\Order\Services\OrderServiceInterface;
use App\Models\Order;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderService implements OrderServiceInterface
{
    /**
     * @param OrderRepositoryInterface $orderRepository
     * @param CartRepositoryInterface $cartRepository
     */
    public function __construct(
        private OrderRepositoryInterface         $orderRepository,
        private readonly CartRepositoryInterface $cartRepository)
    {
    }


    /**
     * @inheritDoc
     */
    public function createOrderFromCart(int $cartId): Order
    {
        $cart = $this->cartRepository->findById($cartId);
        if (!$cart || !$cart->items()->exists()) {
            throw new Exception('Cart is empty.');
        }
        return DB::transaction(function () use ($cart) {
            $order = $this->orderRepository->create([
                'user_id' => $cart->user_id,
                'shipping_address_id' => $cart->shippingAddress->id,
                'billing_address_id' => $cart->billingAddress->id ?? null,
                'subtotal' => $cart->subtotal,
                'tax_amount' => $cart->tax_amount,
                'discount_amount' => $cart->discount_amount,
                'grand_total' => $cart->grand_total,
                'status' => 'pending',
                'coupon_code' => $cart->coupon_code,
                'payment_method' => null,
                'is_paid' => false,
            ]);

            $cart->items->each(function ($item) use ($order) {
                $this->orderRepository->addItemToOrder($order, $item);
            });

            $isCleared = $this->cartRepository->clear($cart);

            if (!$isCleared) {
                Log::error("Cart was not cleared successfully");
            }

            return $order;
        });
    }

    public function checkout(int $userId): Order
    {
        $cart = $this->cartRepository->getUserCart($userId);
        if ($cart->items->isEmpty()) {
            throw new Exception('Cart is empty.');
        }

        $cart->calculateTotals();

        $orderData = [
            'user_id' => $userId,
            'shipping_address_id' => $cart->shipping_address_id,
            'billing_address_id' => $cart->billing_address_id,
            'subtotal' => $cart->subtotal,
            'tax_amount' => $cart->tax_amount,
            'discount_amount' => $cart->discount_amount,
            'grand_total' => $cart->grand_total,
            'status' => 'pending',
            'coupon_code' => $cart->coupon_code,
            'payment_method' => null,
            'is_paid' => false,
        ];
        $order = $this->orderRepository->createOrder($orderData);

        $itemsData = $cart->items->map(function ($item) {
            return [
                'product_id' => $item->product_id,
                'store_id' => $item->store_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'price_incl_tax' => $item->price_incl_tax,
                'tax_percent' => $item->tax_percent,
                'discount_amount' => $item->discount_amount,
            ];
        })->toArray();

        $this->orderRepository->addOrderItems($order, $itemsData);
        $this->cartRepository->clearCart($cart->id);

        return $order;
    }
}
