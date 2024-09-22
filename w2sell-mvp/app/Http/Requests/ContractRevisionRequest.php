<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRevisionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'contract_id' => ['required', 'exists:contracts'],
            'description' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
