<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillingAddressRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'store_id' => ['required', 'exists:stores'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'country' => ['required'],
            'address1' => ['required'],
            'address2' => ['nullable'],
            'city' => ['required'],
            'state' => ['required'],
            'zip' => ['required'],
            'is_default' => ['nullable', 'boolean'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
