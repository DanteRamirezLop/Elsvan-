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
                Select::make('tag')
                ->label('Etiqueta')
                ->options([
                    'vendido' => 'Vendido',
                    'lanzamiento' => 'Lanzamiento',
                    'estreno' => 'Estreno',
                ])
                ->placeholder('Selecciona una etiqueta'),
                TextInput::make('rooms_from'),
                TextInput::make('bathrooms_from'),
                TextInput::make('delivery_date'),

            ]);
    }
}
