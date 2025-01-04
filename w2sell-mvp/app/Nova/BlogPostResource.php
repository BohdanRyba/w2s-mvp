<?php

namespace App\Nova;

use App\Models\BlogPost;
use Ebess\AdvancedNovaMediaLibrary\Fields\Files;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class BlogPostResource extends Resource
{
    public static $model = BlogPost::class;

    public static $title = 'title';

    public static $search = [
        'id', 'title', 'short_description', 'content', 'tags', 'is_new', 'is_published'
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Images::make('Post title', 'blog_post_image')
                ->rules( 'required'),

            Text::make('Title')
                ->sortable()
                ->rules('required'),

            DateTime::make('Published At')
                ->sortable()
                ->rules('required', 'date'),

            Text::make('Short Description')
                ->sortable()
                ->rules('required'),

            Boolean::make('Is New')->sortable()->rules('required')->default(true),
            Boolean::make('Is Published')->sortable()->rules('required')->default(true),
            Boolean::make('Is Ai')->sortable()->rules('required')->default(false),

            Text::make('Content')
                ->sortable()
                ->rules('required'),

            Text::make('Tags')
                ->sortable()
                ->rules('required'),


            BelongsTo::make('BlogCategory', 'blogCategory', BlogCategoryResource::class),
        ];
    }

    public function cards(Request $request): array
    {
        return [];
    }

    public function filters(Request $request): array
    {
        return [];
    }

    public function lenses(Request $request): array
    {
        return [];
    }

    public function actions(Request $request): array
    {
        return [];
    }
}
