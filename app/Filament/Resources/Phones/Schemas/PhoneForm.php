<?php

namespace App\Filament\Resources\Phones\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PhoneForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Título')
                    ->placeholder('Ejemplo: Ventas')
                    ->required()
                    ->trim()
                    ->maxLength(255),

                TextInput::make('name')
                    ->label('Nombre')
                    ->placeholder('Ejemplo: Juan Pérez')
                    ->required()
                    ->trim()
                    ->maxLength(255),

                TextInput::make('number')
                    ->label('Número telefónico')
                    ->placeholder('+51 999 999 999')
                    ->tel()
                    ->required()
                    ->trim()
                    ->maxLength(30),
            ])
            ->columns(2);
    }
}
