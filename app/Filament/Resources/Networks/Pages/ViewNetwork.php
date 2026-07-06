<?php

namespace App\Filament\Resources\Networks\Pages;

use App\Filament\Resources\Networks\NetworkResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewNetwork extends ViewRecord
{
    protected static string $resource = NetworkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
