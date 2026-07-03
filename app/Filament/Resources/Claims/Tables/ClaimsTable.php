<?php

namespace App\Filament\Resources\Claims\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ClaimsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('address')
                    ->searchable(),
                TextColumn::make('mail')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('typedocument')
                    ->searchable(),
                TextColumn::make('document')
                    ->searchable(),
                TextColumn::make('services')
                    ->searchable(),
                TextColumn::make('typeclaim')
                    ->searchable(),
                TextColumn::make('isauthorization')
                    ->searchable(),
                TextColumn::make('father_name')
                    ->searchable(),
                TextColumn::make('father_document')
                    ->searchable(),
                TextColumn::make('father_mail')
                    ->searchable(),
                TextColumn::make('father_phone')
                    ->searchable(),
                TextColumn::make('father_address')
                    ->searchable(),
                TextColumn::make('reference_number')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
