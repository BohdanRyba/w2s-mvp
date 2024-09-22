<?php

namespace App\Http\Resources;

use App\Models\CustomizableOption;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin CustomizableOption */
class CustomizableOptionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'is_required' => $this->is_required,
            'options' => $this->options,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'product_id' => $this->product_id,

            'product' => new ProductResource($this->whenLoaded('product')),
        ];
    }
}
