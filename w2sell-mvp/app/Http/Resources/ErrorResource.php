<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ErrorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'status' => $this->status ?? 'error',
            'message' => $this->message ?? 'Something goes wrong.',
            'code' => $this->code ?? 400
        ];
    }
}
