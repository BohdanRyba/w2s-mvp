<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'max:254'],
            'message' => ['required', 'string'],
            'g-recaptcha-response' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
