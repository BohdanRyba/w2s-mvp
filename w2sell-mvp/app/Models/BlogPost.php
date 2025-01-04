<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\File;

class BlogPost extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, Sluggable, InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'image_path',
        'blog_category_id',
        'is_published',
        'published_at',
        'is_new',
        'is_ai',
        'short_description',
        'content',
        'tags',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('blog_post_image')
            ->singleFile(); // Ensures only one file is kept in this collection
    }

    public function getImageUrlAttribute()
    {
        $media = $this->getFirstMedia('blog_post_image');
        return $media ? $media->getUrl() : null;
    }

    public function blogCategory(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class);
    }

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'datetime',
            'is_new' => 'boolean',
            'is_ai' => 'boolean',
        ];
    }
}
