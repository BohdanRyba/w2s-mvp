<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomizableOptionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product_id' => ['required', 'exists:products'],
            'name' => ['required'],
            'type' => ['required'],
            'is_required' => ['boolean'],
            'options' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
