<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaxClassRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'tax_rate' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
