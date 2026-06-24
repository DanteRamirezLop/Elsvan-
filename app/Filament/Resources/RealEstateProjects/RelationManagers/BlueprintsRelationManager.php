<?php

namespace App\Filament\Resources\RealEstateProjects\RelationManagers;

use App\Filament\Resources\RealEstateProjects\RealEstateProjectResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;

class BlueprintsRelationManager extends RelationManager
{
    protected static string $relationship = 'blueprints';

    protected static ?string $relatedResource = RealEstateProjectResource::class;

    protected static ?string $title = 'Planos';


    public function form(Schema $schema): Schema
    {
        return $schema->components([

                TextInput::make('name')
                    ->label('Nombre')
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Descripción')
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->label('Imagen')
                    ->image()
                    ->directory('project-blueprint')
                    ->visibility('public'),

               TextInput::make('number_departments')
                    ->label('Número de Departamento')
                    ->maxLength(255),

                TextInput::make('area_from')
                    ->label('Area total')
                    ->maxLength(255),

                TextInput::make('bedrooms')
                    ->label('Habitaciones')
                    ->maxLength(255),

               TextInput::make('bathrooms')
                    ->label('Baños')
                    ->maxLength(255),

                TextInput::make('garden')
                    ->label('Jardín')
                    ->maxLength(255),

                TextInput::make('balcony')
                    ->label('Balcon')
                    ->maxLength(255),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable(),

                // TextColumn::make('description')
                //     ->label('Descripción')
                //     ->searchable(),

                ImageColumn::make('image')
                    ->label('Imagen'),

                TextColumn::make('number_departments')
                    ->label('Número de Departamento')
                    ->searchable(),

                 TextColumn::make('area_from')
                    ->label('Area total')
                    ->searchable(),

                TextColumn::make('bedrooms')
                    ->label('Habitaciones')
                    ->searchable(),

                TextColumn::make('bathrooms')
                    ->label('Baños')
                    ->searchable(),

                TextColumn::make('garden')
                    ->label('Terraza')
                    ->searchable(),

              TextColumn::make('balcony')
                    ->label('Balcon')
                    ->searchable(),

            ])
            ->headerActions([
                CreateAction::make()
                    ->label('Agregar ambiente'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }
}
