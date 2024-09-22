<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorizationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'token_type' => 'Bearer',
            'token' => $this->token,
            'expires_id' => config('sanctum.expiration') ? now()->addMinutes(config('sanctum.expiration'))->diffInSeconds(now()) : null,
            'user' => new UserResource($this->user),
        ];
    }
}
