<?php

namespace App\Http\Resources;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Profile */
class ProfileResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'image' => $this->getFirstMedia('profile_image')->original_url,
            'bg_image' => $this->getFirstMedia('profile_background')->original_url,
            'country' => $this->country,
            'language' => $this->language,
            'contact' => $this->contact,
            'messanger' => $this->messanger,
            'state' => $this->messanger,
            'zip' => $this->messanger,
            'timezone' => $this->messanger,
            'currency' => $this->messanger,
            'address' => $this->messanger,
            'address1' => $this->messanger,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_id' => $this->user_id,
        ];
    }
}
