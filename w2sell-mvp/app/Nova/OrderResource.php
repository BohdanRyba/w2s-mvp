<?php

namespace App\Nova;

use App\Models\Order;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class OrderResource extends Resource
{
    public static $model = Order::class;

    public static $title = 'id';

    public static $search = [
        'id'
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

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

            Text::make('Status')
                ->sortable()
                ->rules('nullable'),

            Text::make('Coupon Code')
                ->sortable()
                ->rules('nullable'),

            Text::make('Payment Method')
                ->sortable()
                ->rules('nullable'),

            BelongsTo::make('User', 'user', User::class),

            BelongsTo::make('ShippingAddress', 'shippingAddress', ShippingAddressResource::class),

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
