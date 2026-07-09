<?php

namespace App\Filament\Resources\Networks;

use App\Filament\Resources\Networks\Pages\CreateNetwork;
use App\Filament\Resources\Networks\Pages\EditNetwork;
use App\Filament\Resources\Networks\Pages\ListNetworks;
use App\Filament\Resources\Networks\Pages\ViewNetwork;
use App\Filament\Resources\Networks\Schemas\NetworkForm;
use App\Filament\Resources\Networks\Schemas\NetworkInfolist;
use App\Filament\Resources\Networks\Tables\NetworksTable;
use App\Models\Network;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class NetworkResource extends Resource
{
    protected static ?string $model = Network::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-hashtag';

    protected static ?string $recordTitleAttribute = 'Network';

    public static function form(Schema $schema): Schema
    {
        return NetworkForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return NetworkInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NetworksTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListNetworks::route('/'),
            'create' => CreateNetwork::route('/create'),
            'view' => ViewNetwork::route('/{record}'),
            'edit' => EditNetwork::route('/{record}/edit'),
        ];
    }
}
