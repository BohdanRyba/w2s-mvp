<?php

namespace App\Http\Resources;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin CartItem */
class CartItemResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'price_incl_tax' => $this->price_incl_tax,
            'discount_amount' => $this->discount_amount,
            'coupon_code' => $this->coupon_code,
            'product_options' => $this->product_options,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'cart_id' => $this->cart_id,
            'store_id' => $this->store_id,
            'product_id' => $this->product_id,

            'cart' => new CartResource($this->whenLoaded('cart')),
            'store' => new StoreResource($this->whenLoaded('store')),
            'product' => new ProductResource($this->whenLoaded('product')),
        ];
    }
}
