<?php

namespace App\Filament\Resources\RealEstateProjects\RelationManagers;

use App\Filament\Resources\RealEstateProjects\RealEstateProjectResource;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;



class EnvironmentsRelationManager extends RelationManager
{
    protected static string $relationship = 'environments';

    protected static ?string $relatedResource = RealEstateProjectResource::class;

     protected static ?string $title = 'Ambientes';

    // public function table(Table $table): Table
    // {
    //     return $table
    //         ->headerActions([
    //             CreateAction::make(),
    //         ]);
    // }

    // public static function form(Schema $schema): Schema
    // {
    //     return PageForm::configure($schema);
    // }

    public function form(Schema $schema): Schema
    {
        return $schema->components([
                Select::make('type')
                    ->label('Tipo de ambiente')
                    ->options([
                        'cocina' => 'Cocina',
                        'sala' => 'Sala',
                        'comedor' => 'Comedor',
                        'dormitorio' => 'Dormitorio',
                        'bano' => 'Baño',
                        'terraza' => 'Terraza',
                        'lavanderia' => 'Lavandería',
                        'estudio' => 'Estudio',
                    ])
                    ->required(),

                TextInput::make('title')
                    ->label('Título')
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Descripción')
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->label('Imagen')
                    ->image()
                    ->directory('project-environments')
                    ->visibility('public'),

                TextInput::make('sort_order')
                    ->label('Orden')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table->columns([
                ImageColumn::make('image')
                    ->label('Imagen'),

                TextColumn::make('type')
                    ->label('Ambiente')
                    ->badge(),

                TextColumn::make('title')
                    ->label('Título')
                    ->searchable(),

                TextColumn::make('sort_order')
                    ->label('Orden')
                    ->sortable(),
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
