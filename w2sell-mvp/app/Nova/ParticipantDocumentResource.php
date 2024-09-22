<?php

namespace App\Nova;

use App\Models\ParticipantDocument;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class ParticipantDocumentResource extends Resource
{
    public static $displayInNavigation = false;

    public static $model = ParticipantDocument::class;

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

            BelongsTo::make('ContractParticipant', 'contractParticipant', ContractParticipantResource::class),
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
