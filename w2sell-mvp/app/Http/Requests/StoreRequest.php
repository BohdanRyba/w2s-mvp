<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users'],
            'title' => ['required'],
            'short_description' => ['nullable'],
            'description' => ['nullable'],
            'image' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
