<?php

namespace App\Http\Resources;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin OrderItem */
class OrderItemResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'price_incl_tax' => $this->price_incl_tax,
            'tax_percent' => $this->tax_percent,
            'discount_amount' => $this->discount_amount,

            'subtotal' => $this->getSubtotal(),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'store_id' => $this->store_id,

            'order' => new OrderResource($this->whenLoaded('order')),
            'product' => new ProductResource($this->whenLoaded('product')),
            'store' => new StoreResource($this->whenLoaded('store')),
        ];
    }
}
