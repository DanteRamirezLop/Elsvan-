<?php

namespace App\Filament\Resources\RealEstateProjects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;


use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Str;

class RealEstateProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        // return $schema->components([
        //     TextInput::make('name')
        //         ->label('Nombre del proyecto')
        //         ->required()
        //         ->live(onBlur: true)
        //         ->afterStateUpdated(function ($state, callable $set) {
        //             $set('slug', Str::slug($state));
        //         }),

        //     TextInput::make('slug')
        //         ->required()
        //         ->unique(ignoreRecord: true),

        //     TextInput::make('location')
        //         ->label('Ubicación'),

        //     Textarea::make('description')
        //         ->label('Descripción')
        //         ->columnSpanFull(),

        //     TextInput::make('price_from')
        //         ->label('Precio desde')
        //         ->numeric()
        //         ->prefix('S/'),

        //     TextInput::make('area_from')
        //         ->label('Área desde')
        //         ->numeric()
        //         ->suffix('m²'),

        //     FileUpload::make('main_image')
        //         ->label('Imagen principal')
        //         ->image()
        //         ->directory('real-estate-projects')
        //         ->visibility('public'),

        //     Select::make('status')
        //         ->label('Estado')
        //         ->options([
        //             'draft' => 'Borrador',
        //             'published' => 'Publicado',
        //         ])
        //         ->default('draft')
        //         ->required(),
        // ]);



        return $schema->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('location'),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('price_from')
                    ->numeric(),
                TextInput::make('area_from')
                    ->numeric(),
                FileUpload::make('main_image')
                    ->image(),
                Select::make('status')
                    ->options(['draft' => 'Draft', 'published' => 'Published'])
                    ->default('draft')
                    ->required(),
            ]);
    }
}
