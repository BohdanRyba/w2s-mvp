<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ValidationErrorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'status' => $this->status ?? 'error',
            'message' => $this->message ?? 'Validation failed',
            'errors' => $this->errors(),  // List of validation errors for each field
            'code' => $this->code ?? 422, // Optional, defaults to 422 Unprocessable Entity
        ];
    }
}
