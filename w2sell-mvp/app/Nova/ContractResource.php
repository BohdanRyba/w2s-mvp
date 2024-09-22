<?php

namespace App\Nova;

use App\Models\Contract;
use App\Models\ContractParticipant;
use App\Models\ContractRevision;
use App\Nova\Metrics\ContractCount;
use Ebess\AdvancedNovaMediaLibrary\Fields\Files;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Resources\UserResource;
use Laravel\Nova\Panel;

class ContractResource extends Resource
{

    public static function label()
    {
        return 'Contracts';
    }

    public static $model = Contract::class;

    public static $title = 'title';

    public static $search = [
        'id', 'title', 'description', 'status'
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:255'),

            Textarea::make('Description')
                ->alwaysShow()
                ->rules('nullable'),

            Select::make('Status')
                ->options([
                    'pending' => 'Pending',
                    'active' => 'Active',
                    'completed' => 'Completed',
                    'archived' => 'Archived',
                ])
                ->displayUsingLabels()
                ->rules('required'),


            Files::make('Single file', "contract_{$this->id}"),

            HasMany::make('Revisions', 'revisions', ContractRevisionResource::class),

            BelongsToMany::make('Participants', 'participants', User::class),

        ];
    }

    public function cards(Request $request): array
    {
        return [
//            new Panel('Contract Metrics', [
//                ContractCount::class,
//            ]),
        ];
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
