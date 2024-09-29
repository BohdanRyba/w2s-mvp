<?php

namespace App\Nova;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;

class OrderItemResource extends Resource
{
    public static $model = OrderItem::class;

    public static $title = 'id';

    public static $search = [
        'id'
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Number::make('Quantity')
                ->sortable()
                ->rules('nullable', 'integer'),

            Number::make('Price')
                ->sortable()
                ->rules('nullable', 'numeric'),

            Number::make('Price Incl Tax')
                ->sortable()
                ->rules('nullable', 'numeric'),

            Number::make('Tax Percent')
                ->sortable()
                ->rules('nullable', 'numeric'),

            Number::make('Discount Amount')
                ->sortable()
                ->rules('nullable', 'numeric'),

            BelongsTo::make('Order', 'order', OrderResource::class),

            BelongsTo::make('Product', 'product', ProductResource::class),

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
