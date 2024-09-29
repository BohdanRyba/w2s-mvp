<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartItemRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cart_id' => ['required', 'exists:carts'],
            'store_id' => ['required', 'exists:stores'],
            'product_id' => ['required', 'exists:products'],
            'quantity' => ['nullable', 'integer'],
            'price' => ['nullable', 'numeric'],
            'price_incl_tax' => ['nullable', 'numeric'],
            'discount_amount' => ['nullable', 'numeric'],
            'coupon_code' => ['required'],
            'product_options' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
