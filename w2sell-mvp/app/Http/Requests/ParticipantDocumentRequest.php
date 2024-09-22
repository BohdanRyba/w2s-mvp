<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticipantDocumentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'contract_participant_id' => ['required', 'exists:contract_participants'],
            'path' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
