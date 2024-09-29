<?php

namespace App\Http\Controllers\Api\Checkout;

use App\Domain\Cart\Services\CartServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(private readonly CartServiceInterface $cartService)
    {
    }

    public function addToCart(Request $request)
    {
        $userId = $request->user->id;
        $items = $request->only(['product_id', 'quantity']);
        $cart = $this->cartService->addToCart($userId, $items);
        return (new CartResource($cart))->additional([
            'message' => 'Item added to cart successfully.',
        ]);
    }

    public function viewCart(Request $request)
    {
        $userId = $request->user->id;
        $cart = $this->cartService->viewCart($userId);
        return new CartResource($cart);
    }

    public function updateItem(Request $request, $itemId)
    {
        $userId = $request->user()->id;
        $itemData = $request->only(['quantity']);
        $cart = $this->cartService->updateCartItem($userId, $itemId, $itemData);
        return new CartResource($cart);
    }

    public function removeItem(Request $request, $itemId)
    {
        $userId = $request->user()->id;
        $cart = $this->cartService->deleteCartItem($userId, $itemId);
        return new CartResource($cart);
    }
}
