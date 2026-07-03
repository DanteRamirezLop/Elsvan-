<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
       return $schema
            ->components([
                Textarea::make('head_scripts')
                    ->label('Scripts del Head')
                    ->helperText(
                        'Agrega aquí los scripts que deben cargarse dentro de la etiqueta <head>.'
                    )
                    ->placeholder(
                        '<script>...</script>'
                    )
                    ->rows(12)
                    ->disableGrammarly()
                    ->columnSpanFull(),

                Textarea::make('body_scripts')
                    ->label('Scripts del Body')
                    ->helperText(
                        'Agrega aquí los scripts que deben cargarse dentro de la etiqueta <body>.'
                    )
                    ->placeholder(
                        '<script>...</script>'
                    )
                    ->rows(12)
                    ->disableGrammarly()
                    ->columnSpanFull(),
            ]);
    }
}
