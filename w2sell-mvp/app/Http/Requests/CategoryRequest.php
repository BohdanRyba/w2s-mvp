<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'store_id' => ['required', 'exists:stores'],
            'parent_id' => ['nullable', 'exists:categories'],
            'name' => ['required'],
            'description' => ['nullable'],
            'image' => ['nullable'],
            'is_active' => ['boolean'],
            'is_shown' => ['boolean'],
            'meta_title' => ['nullable'],
            'meta_keywords' => ['nullable'],
            'meta_description' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
