<?php

namespace App\Filament\Resources\RealEstateProjects\Pages;

use App\Filament\Resources\RealEstateProjects\RealEstateProjectResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRealEstateProjects extends ListRecords
{
    protected static string $resource = RealEstateProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
