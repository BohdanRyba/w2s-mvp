<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users'],
            'guest_token' => ['nullable'],
            'currency_code' => ['nullable'],
            'subtotal' => ['nullable', 'numeric'],
            'tax_amount' => ['nullable', 'numeric'],
            'discount_amount' => ['nullable', 'numeric'],
            'grand_total' => ['nullable', 'numeric'],
            'is_guest' => ['nullable', 'boolean'],
            'coupon_code' => ['required'],
            'billing_address_id' => ['required', 'exists:billing_addresses'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
