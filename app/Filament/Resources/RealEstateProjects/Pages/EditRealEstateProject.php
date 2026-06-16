<?php

namespace App\Filament\Resources\RealEstateProjects\Pages;

use App\Filament\Resources\RealEstateProjects\RealEstateProjectResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRealEstateProject extends EditRecord
{
    protected static string $resource = RealEstateProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
