<?php

namespace App\Filament\Resources\WorldResource\Pages;

use App\Filament\Resources\WorldResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWorld extends EditRecord
{
    protected static string $resource = WorldResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
