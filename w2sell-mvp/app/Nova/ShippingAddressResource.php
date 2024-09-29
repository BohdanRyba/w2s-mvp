<?php

namespace App\Nova;

use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class ShippingAddressResource extends Resource
{
    public static $model = ShippingAddress::class;

    public static $title = 'id';

    public static $search = [
        'id'
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Firstname')
                ->sortable()
                ->rules('nullable'),

            Text::make('Lastname')
                ->sortable()
                ->rules('nullable'),

            Text::make('Street')
                ->sortable()
                ->rules('nullable'),

            Text::make('City')
                ->sortable()
                ->rules('nullable'),

            Text::make('Postcode')
                ->sortable()
                ->rules('nullable'),

            Text::make('Region')
                ->sortable()
                ->rules('nullable'),

            Text::make('Country Code')
                ->sortable()
                ->rules('nullable'),

            Text::make('Phone')
                ->sortable()
                ->rules('nullable'),

            Text::make('Email')
                ->sortable()
                ->rules('nullable', 'email', 'max:254'),

            BelongsTo::make('Cart', 'cart', CartResource::class),
            BelongsTo::make('Order', 'order', OrderResource::class),
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
