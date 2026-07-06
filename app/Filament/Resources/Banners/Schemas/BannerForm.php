<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Schemas\Schema;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;

use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                 FileUpload::make('imagen')
                    ->label('Imagen principal')
                    ->image()
                    ->disk('public')
                    ->directory('banners')
                    ->visibility('public')
                    ->imageEditor(),

            TextInput::make('titulo')
                ->label('Título')
                ->required()
                ->maxLength(255),

            TextInput::make('subtitulo')
                ->label('Subtítulo')
                ->maxLength(255),

            TextInput::make('link')
                ->label('Link')
                ->maxLength(255),
            ]);
    }
}
