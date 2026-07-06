<?php

namespace App\Filament\Resources\Networks\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class NetworkInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('imagen')
                    ->placeholder('-'),
                TextEntry::make('link')
                    ->placeholder('-'),
                TextEntry::make('titulo'),
                TextEntry::make('subtitulo')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
