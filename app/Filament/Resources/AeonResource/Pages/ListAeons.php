<?php

namespace App\Filament\Resources\AeonResource\Pages;

use App\Filament\Resources\AeonResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAeons extends ListRecords
{
    protected static string $resource = AeonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
