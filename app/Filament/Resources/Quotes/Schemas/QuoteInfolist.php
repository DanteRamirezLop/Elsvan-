<?php

namespace App\Filament\Resources\Quotes\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class QuoteInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('project')
                    ->label('Proyecto'),
                TextEntry::make('unit')
                    ->label('Departamento'),
                TextEntry::make('name')
                    ->label('Nombre'),
                TextEntry::make('phone')
                    ->label('Celular'),
                TextEntry::make('document_type')
                    ->label('Tipo de documento'),
                TextEntry::make('document_number')
                    ->label('Número de documento'),
                TextEntry::make('email')
                    ->label('Correo'),
                IconEntry::make('terms_accepted')
                    ->label('Aceptó términos')
                    ->boolean(),
                TextEntry::make('message')
                    ->label('Mensaje')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->label('Fecha')
                    ->dateTime(),
            ]);
    }
}
