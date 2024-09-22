<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDataResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'user' => new UserResource($this->user),
            'profile' => new ProfileResource($this->profile),
            'stores' => StoreResource::collection($this->stores),
        ];
    }
}
