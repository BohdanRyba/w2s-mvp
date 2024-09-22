<?php

namespace App\Nova;

use App\Models\Store;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;

class StoreResource extends Resource
{
    public static $model = Store::class;
    public static $title = 'title';
    public static $search = [
        'id', 'title'
    ];

    public static function label(): string
    {
        return 'Stores';
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Title')
                ->sortable()
                ->rules('required'),

            Text::make('Short Description')
                ->sortable()
                ->rules('nullable'),

            Text::make('Description')
                ->sortable()
                ->rules('nullable'),

            Images::make('Image', 'store_image')
                ->rules('nullable'),

            BelongsTo::make('User', 'user', User::class),

            HasMany::make('BillingAddressResource','billingAddresses'),
            HasMany::make('CategoryResource','categories'),
            HasMany::make('ProductResource', 'products')

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
