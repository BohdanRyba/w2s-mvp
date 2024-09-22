<?php

namespace App\Nova;

use App\Models\BillingAddress;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class BillingAddressResource extends Resource
{
    public static $displayInNavigation = false;

    public static $model = BillingAddress::class;

    public static $title = 'id';

    public static $search = [
        'id', 'first_name', 'last_name', 'country', 'address1', 'city', 'state', 'zip'
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('First Name')
                ->sortable()
                ->rules('required'),

            Text::make('Last Name')
                ->sortable()
                ->rules('required'),

            Text::make('Country')
                ->sortable()
                ->rules('required'),

            Text::make('Address1')
                ->sortable()
                ->rules('required'),

            Text::make('Address2')
                ->sortable()
                ->rules('nullable'),

            Text::make('City')
                ->sortable()
                ->rules('required'),

            Text::make('State')
                ->sortable()
                ->rules('required'),

            Text::make('Zip')
                ->sortable()
                ->rules('required'),

            BelongsTo::make('Store', 'store', StoreResource::class),
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
