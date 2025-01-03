<?php

namespace App\Http\Resources;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin BlogPost */
class BlogPostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'is_published' => $this->is_published,
            'published_at' => $this->published_at,
            'is_new' => $this->is_new,
            'is_ai' => $this->is_ai,
            'short_description' => $this->short_description,
            'content' => $this->content,
            'tags' => $this->tags,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'blog_category_id' => $this->blog_category_id,

            'blogCategory' => new BlogCategoryResource($this->whenLoaded('blogCategory')),
        ];
    }
}
