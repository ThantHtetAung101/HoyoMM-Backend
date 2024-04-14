<?php

namespace App\Filament\Resources\ReadableResource\Pages;

use App\Filament\Resources\ReadableResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReadables extends ListRecords
{
    protected static string $resource = ReadableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
