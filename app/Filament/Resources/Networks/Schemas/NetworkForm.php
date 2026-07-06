<?php

namespace App\Filament\Resources\Networks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class NetworkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('imagen'),
                TextInput::make('link'),
                TextInput::make('titulo')
                    ->required(),
                TextInput::make('subtitulo'),
            ]);
    }
}
