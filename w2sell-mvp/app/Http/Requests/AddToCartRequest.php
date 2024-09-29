<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddToCartRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'The product is required.',
            'product_id.exists'   => 'The selected product does not exist.',
            'quantity.required'   => 'The quantity is required.',
            'quantity.integer'    => 'The quantity must be an integer.',
            'quantity.min'        => 'The quantity must be at least 1.',
        ];
    }
}
