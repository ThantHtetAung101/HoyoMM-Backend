<?php

namespace App\Filament\Resources\ReadableResource\Pages;

use App\Filament\Resources\ReadableResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReadable extends EditRecord
{
    protected static string $resource = ReadableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
