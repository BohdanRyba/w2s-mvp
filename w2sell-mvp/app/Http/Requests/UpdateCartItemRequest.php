<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCartItemRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'quantity' => 'required|integer|min:1',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'quantity.required' => 'The quantity is required.',
            'quantity.integer'  => 'The quantity must be an integer.',
            'quantity.min'      => 'The quantity must be at least 1.',
        ];
    }
}
