<?php

namespace App\Filament\Resources\RealEstateProjects;

use App\Filament\Resources\RealEstateProjects\RelationManagers\EnvironmentsRelationManager;
use App\Filament\Resources\RealEstateProjects\RelationManagers\BlueprintsRelationManager;

use App\Filament\Resources\RealEstateProjects\Pages\CreateRealEstateProject;
use App\Filament\Resources\RealEstateProjects\Pages\EditRealEstateProject;
use App\Filament\Resources\RealEstateProjects\Pages\ListRealEstateProjects;
use App\Filament\Resources\RealEstateProjects\Pages\ViewRealEstateProject;
use App\Filament\Resources\RealEstateProjects\Schemas\RealEstateProjectForm;
use App\Filament\Resources\RealEstateProjects\Schemas\RealEstateProjectInfolist;
use App\Filament\Resources\RealEstateProjects\Tables\RealEstateProjectsTable;
use App\Models\RealEstateProject;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RealEstateProjectResource extends Resource
{
    protected static ?string $model = RealEstateProject::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Project';

    public static function form(Schema $schema): Schema
    {
        return RealEstateProjectForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RealEstateProjectInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RealEstateProjectsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            EnvironmentsRelationManager::class,
            BlueprintsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRealEstateProjects::route('/'),
            'create' => CreateRealEstateProject::route('/create'),
            'view' => ViewRealEstateProject::route('/{record}'),
            'edit' => EditRealEstateProject::route('/{record}/edit'),
        ];
    }
}
