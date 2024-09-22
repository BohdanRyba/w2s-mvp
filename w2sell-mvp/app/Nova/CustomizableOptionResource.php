<?php

namespace App\Nova;

use App\Models\CustomizableOption;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class CustomizableOptionResource extends Resource
{
    public static $displayInNavigation = false;

    public static $model = CustomizableOption::class;

    public static $title = 'name';

    public static $search = [
        'id', 'name', 'type', 'options'
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required'),

            Text::make('Type')
                ->sortable()
                ->rules('required'),

            Text::make('Options')
                ->sortable()
                ->rules('required'),

            BelongsTo::make('Product', 'product', ProductResource::class),
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
