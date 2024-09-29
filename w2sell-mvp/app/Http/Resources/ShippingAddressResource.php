<?php

namespace App\Http\Resources;

use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin ShippingAddress */
class ShippingAddressResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'street' => $this->street,
            'city' => $this->city,
            'postcode' => $this->postcode,
            'region' => $this->region,
            'country_code' => $this->country_code,
            'phone' => $this->phone,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'cart_id' => $this->cart_id,

            'cart' => new CartResource($this->whenLoaded('cart')),
        ];
    }
}
