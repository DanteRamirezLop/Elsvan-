<?php

namespace App\Filament\Resources\Claims\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ClaimForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('address')
                    ->required(),
                TextInput::make('mail')
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('typedocument')
                    ->required(),
                TextInput::make('document')
                    ->required(),
                TextInput::make('services')
                    ->required(),
                Textarea::make('hired')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('typeclaim')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('isauthorization')
                    ->required(),
                TextInput::make('father_name'),
                TextInput::make('father_document'),
                TextInput::make('father_mail'),
                TextInput::make('father_phone')
                    ->tel(),
                TextInput::make('father_address'),
                TextInput::make('reference_number')
                    ->required(),
            ]);
    }
}
