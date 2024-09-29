<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'shipping_address_id' => 'required|exists:shipping_addresses,id',
            'billing_address_id'  => 'nullable|exists:billing_addresses,id',
            'payment_method'      => 'required|string|max:255',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'shipping_address_id.required' => 'A valid shipping address is required.',
            'shipping_address_id.exists'   => 'The selected shipping address does not exist.',
            'billing_address_id.exists'    => 'The selected billing address does not exist.',
            'payment_method.required'      => 'The payment method is required.',
        ];
    }
}
