<?php

namespace App\Http\Resources;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin BlogCategory */
class BlogCategoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'sort_order' => $this->sort_order,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'parent_category_id' => $this->parent_category_id,

            'parentCategory' => new BlogCategoryResource($this->whenLoaded('parentCategory')),
        ];
    }
}
