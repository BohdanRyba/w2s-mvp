<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'blog_category_id' => ['required', 'exists:blog_categories'],
            'is_published' => ['boolean'],
            'published_at' => ['required', 'date'],
            'is_new' => ['boolean'],
            'is_ai' => ['boolean'],
            'short_description' => ['required'],
            'content' => ['required'],
            'tags' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
