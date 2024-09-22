<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'exists:categories'],
            'store_id' => ['required', 'exists:stores'],
            'title' => ['required'],
            'short_description' => ['nullable'],
            'description' => ['nullable'],
            'price' => ['required'],
            'stock' => ['required', 'integer'],
            'stock_treshhold' => ['required', 'integer'],
            'image' => ['required'],
            'images' => ['nullable'],
            'weight' => ['nullable'],
            'lenght' => ['nullable'],
            'width' => ['nullable'],
            'height' => ['nullable'],
            'size_unit_type' => ['nullable', 'integer'],
            'weight_unit_type' => ['nullable', 'integer'],
            'options' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
