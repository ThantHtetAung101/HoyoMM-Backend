<?php

namespace App\Filament\Resources\AeonResource\Pages;

use App\Filament\Resources\AeonResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAeon extends EditRecord
{
    protected static string $resource = AeonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
