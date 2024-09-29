<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users'],
            'shipping_address_id' => ['required', 'exists:shipping_addresses'],
            'billing_address_id' => ['required', 'exists:billing_addresses'],
            'subtotal' => ['nullable', 'numeric'],
            'tax_amount' => ['nullable', 'numeric'],
            'discount_amount' => ['nullable', 'numeric'],
            'grand_total' => ['nullable', 'numeric'],
            'status' => ['nullable'],
            'coupon_code' => ['nullable'],
            'payment_method' => ['nullable'],
            'is_paid' => ['boolean'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
