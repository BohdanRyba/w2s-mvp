<?php

namespace App\Nova;

use App\Models\Product;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class ProductResource extends Resource
{
    public static $displayInNavigation = false;

    public static $model = Product::class;

    public static $title = 'title';

    public static $search = [
        'id', 'title', 'price', 'image'
    ];

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

            Text::make('Price')
                ->sortable()
                ->rules('required'),

            Number::make('Stock')
                ->sortable()
                ->rules('required', 'integer'),

            Number::make('Stock Threshold', 'stock_treshhold')
                ->sortable()
                ->rules('required', 'integer'),

            Images::make('Main Image', 'main_image')
                ->rules('required', 'size:1'),

            Images::make('Gallery', 'images')
                ->withResponsiveImages(),

            Text::make('Weight')
                ->sortable()
                ->rules('nullable'),

            Text::make('Length')
                ->sortable()
                ->rules('nullable'),

            Text::make('Width')
                ->sortable()
                ->rules('nullable'),

            Text::make('Height')
                ->sortable()
                ->rules('nullable'),

            Number::make('Size Unit Type')
                ->sortable()
                ->rules('nullable', 'integer'),

            Number::make('Weight Unit Type')
                ->sortable()
                ->rules('nullable', 'integer'),

            BelongsTo::make('Category', 'category', CategoryResource::class),

            BelongsTo::make('Store', 'store', StoreResource::class),

            // Adding the new fields
            Text::make('SKU')
                ->sortable()
                ->rules('required', 'unique:products,sku'),

            BelongsTo::make('Tax Class', 'taxClass', TaxClassResource::class)
                ->sortable()
                ->rules('required'),

            Text::make('Url Key')
                ->sortable()
                ->rules('required'),

            Text::make('Meta Title')
                ->sortable()
                ->rules('nullable'),

            Text::make('Meta Keywords')
                ->sortable()
                ->rules('nullable'),

            Text::make('Meta Description')
                ->sortable()
                ->rules('nullable'),

            Boolean::make('Is Downloadable')
                ->sortable(),

            Text::make('Downloadable Link')
                ->sortable()
                ->rules('nullable'),

            Boolean::make('Is Configurable')
                ->sortable(),

            BelongsTo::make('Parent Product', 'parent', ProductResource::class)
                ->nullable(),

            Text::make('Dropshipper Link')
                ->sortable()
                ->rules('nullable'),

            Text::make('Wholeseller Link')
                ->sortable()
                ->rules('nullable'),

            // Created and Updated timestamps
            DateTime::make('Created At')
                ->exceptOnForms(),

            DateTime::make('Updated At')
                ->exceptOnForms(),

            DateTime::make('Deleted At')
                ->onlyOnDetail(),
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
