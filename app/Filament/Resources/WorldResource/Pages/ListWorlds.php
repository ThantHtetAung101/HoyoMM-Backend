<?php

namespace App\Filament\Resources\WorldResource\Pages;

use App\Filament\Resources\WorldResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWorlds extends ListRecords
{
    protected static string $resource = WorldResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
