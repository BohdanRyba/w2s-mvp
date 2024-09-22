<?php

namespace App\Nova;

use App\Models\ContractParticipant;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\File;

class ContractParticipantResource extends Resource
{
    public static $displayInNavigation = false;

    public static $model = ContractParticipant::class;

    public static $title = 'id';

    public static $search = [
        'id', 'role', 'status'
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Contract', 'contract', Contract::class)
                ->sortable()
                ->rules('required'),

            BelongsTo::make('User', 'user', User::class)
                ->sortable()
                ->rules('required'),

            Select::make('Role')
                ->options([
                    'dropshipper' => 'Dropshipper',
                    'wholeseller' => 'Wholesaler',
                ])
                ->displayUsingLabels()
                ->rules('required'),

            Select::make('Status')
                ->options([
                    'pending' => 'Pending',
                    'accepted' => 'Accepted',
                    'rejected' => 'Rejected',
                ])
                ->displayUsingLabels()
                ->rules('required'),

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
