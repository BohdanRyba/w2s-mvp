<?php

namespace App\Nova;

use App\Models\Category;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;

class CategoryResource extends Resource
{
    public static $displayInNavigation = false;

    public static $model = Category::class;

    public static $title = 'name';

    public static $search = [
        'id', 'name'
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required'),

            Text::make('Description')
                ->sortable()
                ->rules('nullable'),
            Image::make('Image', 'image')
                ->rules('nullable'),

            Text::make('Meta Title')
                ->sortable()
                ->rules('nullable'),

            Text::make('Meta Keywords')
                ->sortable()
                ->rules('nullable'),

            Text::make('Meta Description')
                ->sortable()
                ->rules('nullable'),

            BelongsTo::make('Store', 'store', StoreResource::class),

            BelongsTo::make('CategoryResource', 'parent')
                ->nullable(),
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
