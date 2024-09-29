<?php

namespace App\Http\Resources;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Order */
class OrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'subtotal' => $this->subtotal,
            'tax_amount' => $this->tax_amount,
            'discount_amount' => $this->discount_amount,
            'grand_total' => $this->grand_total,
            'status' => $this->status,
            'coupon_code' => $this->coupon_code,
            'payment_method' => $this->payment_method,
            'is_paid' => $this->is_paid,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'user_id' => $this->user_id,
            'shipping_address_id' => $this->shipping_address_id,
            'billing_address_id' => $this->billing_address_id,

            'items'         => OrderItemResource::collection($this->items), // Each order item
            'shippingAddress' => new ShippingAddressResource($this->whenLoaded('shippingAddress')),
            'billingAddress' => new BillingAddressResource($this->whenLoaded('billingAddress')),
        ];
    }
}
