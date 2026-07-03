<?php

namespace App\Filament\Resources\Claims\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ClaimInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('address'),
                TextEntry::make('mail'),
                TextEntry::make('phone'),
                TextEntry::make('typedocument'),
                TextEntry::make('document'),
                TextEntry::make('services'),
                TextEntry::make('hired')
                    ->columnSpanFull(),
                TextEntry::make('typeclaim'),
                TextEntry::make('description')
                    ->columnSpanFull(),
                TextEntry::make('isauthorization'),
                TextEntry::make('father_name')
                    ->placeholder('-'),
                TextEntry::make('father_document')
                    ->placeholder('-'),
                TextEntry::make('father_mail')
                    ->placeholder('-'),
                TextEntry::make('father_phone')
                    ->placeholder('-'),
                TextEntry::make('father_address')
                    ->placeholder('-'),
                TextEntry::make('reference_number'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
