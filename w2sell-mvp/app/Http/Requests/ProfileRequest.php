<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users'],
            'image' => ['required'],
            'bg_image' => ['required'],
            'country' => ['required'],
            'language' => ['required'],
            'contact' => ['required'],
            'messanger' => ['required'],
            'state' => ['required'],
            'zip' => ['required'],
            'timezone' => ['required'],
            'currency' => ['required'],
            'address' => ['required'],
            'address1' => ['required'],
            'email' => ['required', 'email', 'max:254'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
