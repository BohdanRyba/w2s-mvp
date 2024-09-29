<?php

namespace App\Nova;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class CartItemResource extends Resource
{
    public static $model = CartItem::class;

    public static $title = 'id';

    public static $search = [
        'id', 'coupon_code', 'product_options'
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

            Number::make('Discount Amount')
                ->sortable()
                ->rules('nullable', 'numeric'),

            Text::make('Coupon Code')
                ->sortable()
                ->rules('required'),

            Text::make('Product Options')
                ->sortable()
                ->rules('required'),

            BelongsTo::make('Cart', 'cart', CartResource::class),

            BelongsTo::make('Store', 'store', StoreResource::class),

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
