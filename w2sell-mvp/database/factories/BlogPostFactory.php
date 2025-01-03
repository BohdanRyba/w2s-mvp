<?php

namespace Database\Factories;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BlogPostFactory extends Factory
{
    protected $model = BlogPost::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'is_published' => $this->faker->boolean(),
            'published_at' => Carbon::now(),
            'is_new' => $this->faker->boolean(),
            'is_ai' => $this->faker->boolean(),
            'short_description' => $this->faker->text(),
            'content' => $this->faker->word(),
            'tags' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'blog_category_id' => BlogCategory::factory(),
        ];
    }
}
