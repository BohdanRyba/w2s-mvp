<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Product */
class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'stock_treshhold' => $this->stock_treshhold,
            'image' => $this->getFirstMedia('main_image')->original_url,
            'images' => $this->getMedia('images')->pluck('original_url'),
            'weight' => $this->weight,
            'lenght' => $this->lenght,
            'width' => $this->width,
            'height' => $this->height,
            'size_unit_type' => $this->size_unit_type,
            'weight_unit_type' => $this->weight_unit_type,
            'options' => $this->options,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'category_id' => $this->category_id,
            'store_id' => $this->store_id,

            'category' => new CategoryResource($this->whenLoaded('category')),
            'store' => new StoreResource($this->whenLoaded('store')),
        ];
    }
}
