<?php

namespace App\Filament\Resources\RealEstateProjects\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RealEstateProjectInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('slug'),
                TextEntry::make('location')
                    ->placeholder('-'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('price_from')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('area_from')
                    ->numeric()
                    ->placeholder('-'),
                ImageEntry::make('main_image')
                    ->placeholder('-'),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
