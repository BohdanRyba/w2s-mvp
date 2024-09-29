<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderItemRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'order_id' => ['required', 'exists:orders'],
            'product_id' => ['required', 'exists:products'],
            'store_id' => ['required', 'exists:stores'],
            'quantity' => ['nullable', 'integer'],
            'price' => ['nullable', 'numeric'],
            'price_incl_tax' => ['nullable', 'numeric'],
            'tax_percent' => ['nullable', 'numeric'],
            'discount_amount' => ['nullable', 'numeric'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
