<?php

namespace App\Nova;

use App\Models\ContactForm;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class ContactFormResource extends Resource
{
    public static $model = ContactForm::class;

    public static $title = 'name';

    public static $search = [
        'id', 'name', 'email', 'message'
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254'),

            Text::make('Message')
                ->sortable()
                ->rules('required'),
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
