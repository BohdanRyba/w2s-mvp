<?php

namespace App\Nova;

use App\Models\ContractRevision;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class ContractRevisionResource extends Resource
{
    public static $displayInNavigation = false;

    public static $model = ContractRevision::class;

    public static $title = 'id';

    public static $search = [
        'id', 'description'
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Description')
                ->sortable()
                ->rules('required'),

            BelongsTo::make('Contract', 'contract', ContractResource::class),
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
