<?php

namespace App\Http\Controllers\Api\Checkout;

use App\Domain\Order\Services\OrderServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(private OrderServiceInterface $orderService)
    {
    }

    public function checkout(Request $request)
    {
        try {
            $userId = $request->user->id;
            $order = $this->orderService->checkout($userId);
            return new OrderResource($order);

        } catch (Exception $e) {
            return response()->json(['message' => 'Error placing order', 'error' => $e->getMessage()], 400);
        }
    }
}
