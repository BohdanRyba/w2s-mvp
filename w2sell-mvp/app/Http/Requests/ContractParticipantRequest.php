<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractParticipantRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'contract_id' => ['required', 'exists:contracts'],
            'user_id' => ['required', 'exists:users'],
            'role' => ['nullable'],
            'status' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
