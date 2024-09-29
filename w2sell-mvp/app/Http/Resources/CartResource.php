<?php

namespace App\Http\Resources;

use App\Models\Cart;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Cart */
class CartResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'guest_token' => $this->guest_token,
            'currency_code' => $this->currency_code,
            'subtotal' => $this->subtotal,
            'tax_amount' => $this->tax_amount,
            'discount_amount' => $this->discount_amount,
            'grand_total' => $this->grand_total,
            'is_guest' => $this->is_guest,
            'coupon_code' => $this->coupon_code,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'user_id' => $this->user_id,
            'billing_address_id' => $this->billing_address_id,
            'items' => CartItemResource::collection($this->items),
            'billingAddress' => new BillingAddressResource($this->whenLoaded('billingAddress')),
        ];
    }

    public function toResponse($request)
    {
        // If there's an error (e.g., the cart is empty), we can return an error response
        if ($this->items->isEmpty()) {
            return response()->json([
                'error' => true,
                'message' => 'The cart is empty.',
            ], JsonResponse::HTTP_BAD_REQUEST);
        }

        // Otherwise, return the normal response with success message
        return parent::toResponse($request)->with([
            'message' => 'Cart retrieved successfully.',
        ]);
    }
}
