<?php

namespace App\Filament\Resources\RealEstateProjects\Pages;

use App\Filament\Resources\RealEstateProjects\RealEstateProjectResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRealEstateProject extends ViewRecord
{
    protected static string $resource = RealEstateProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
