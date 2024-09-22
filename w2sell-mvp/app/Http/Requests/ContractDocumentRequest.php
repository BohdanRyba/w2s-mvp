<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractDocumentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'contract_id' => ['required', 'exists:contracts'],
            'path' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
