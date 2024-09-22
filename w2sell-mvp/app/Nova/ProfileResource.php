<?php

namespace App\Nova;

use App\Models\Profile;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;

class ProfileResource extends Resource
{
    public static $displayInNavigation = false;

    public static $model = Profile::class;

    public static $title = 'id';

    public static $search = [
        'id', 'image', 'bg_image', 'country', 'language', 'contact', 'messanger', 'email'
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Images::make('Profile Image', 'profile_image'),

            Images::make('Profile Image', 'profile_background'),

            Select::make('Country')->options([
                'ua' => 'Україна',
                'usa' => 'США'
            ])->rules('required'),

            Select::make('Language')->options([
                'ua' => 'Українська',
                'en' => 'English'
            ])->rules('required'),

            Text::make('Contact')
                ->sortable()
                ->rules('required'),

            Text::make('Messanger')
                ->sortable()
                ->rules('required'),

            Text::make('State')
                ->sortable()
                ->rules('required'),

            Text::make('Zip')
                ->sortable()
                ->rules('required'),

            Text::make('Timezone')
                ->sortable()
                ->rules('required'),

            Text::make('Currency')
                ->sortable()
                ->rules('required'),

            Text::make('Address')
                ->sortable()
                ->rules('required'),

            Text::make('Address1')
                ->sortable()
                ->rules('required'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254'),

            BelongsTo::make('User', 'user', User::class),
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
