<?php

namespace App\Nova;

use App\Models\ContractDocument;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class ContractDocumentResource extends Resource
{
    public static $displayInNavigation = false;

    public static $model = ContractDocument::class;

    public static $title = 'id';

    public static $search = [
        'id', 'path'
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Path')
                ->sortable()
                ->rules('required'),

            BelongsTo::make('Contract', 'contract', ContractResource::class),
            File::make('Documents')
                ->disk('public')
                ->path("contracts/{$this->contract_id}/participants/{$this->user_id}")
                ->multiple()
                ->rules('nullable'),
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
