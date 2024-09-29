<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingAddressRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'firstname' => ['nullable'],
            'lastname' => ['nullable'],
            'street' => ['nullable'],
            'city' => ['nullable'],
            'postcode' => ['nullable'],
            'region' => ['nullable'],
            'country_code' => ['nullable'],
            'phone' => ['nullable'],
            'email' => ['nullable', 'email', 'max:254'],
            'cart_id' => ['required', 'exists:carts'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
