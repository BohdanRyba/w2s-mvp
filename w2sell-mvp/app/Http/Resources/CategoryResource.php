<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Category */
class CategoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image,
            'is_active' => $this->is_active,
            'is_shown' => $this->is_shown,
            'meta_title' => $this->meta_title,
            'meta_keywords' => $this->meta_keywords,
            'meta_description' => $this->meta_description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'store_id' => $this->store_id,
            'parent_id' => $this->parent_id,

            'store' => new StoreResource($this->whenLoaded('store')),
            'parent' => new CategoryResource($this->whenLoaded('parent')),
        ];
    }
}
