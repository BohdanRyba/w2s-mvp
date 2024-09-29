<?php

namespace App\Nova;

use App\Models\Cart;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class CartResource extends Resource
{
    public static $model = Cart::class;

    public static $title = 'id';

    public static $search = [
        'id', 'coupon_code'
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Currency Code')
                ->sortable()
                ->rules('nullable'),

            Number::make('Subtotal')
                ->sortable()
                ->rules('nullable', 'numeric'),

            Number::make('Tax Amount')
                ->sortable()
                ->rules('nullable', 'numeric'),

            Number::make('Discount Amount')
                ->sortable()
                ->rules('nullable', 'numeric'),

            Number::make('Grand Total')
                ->sortable()
                ->rules('nullable', 'numeric'),

            Text::make('Coupon Code')
                ->sortable()
                ->rules('required'),

            BelongsTo::make('User', 'user', User::class),

            BelongsTo::make('BillingAddress', 'billingAddress', BillingAddressResource::class),
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
