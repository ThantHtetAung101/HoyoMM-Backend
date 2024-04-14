<?php

namespace App\Filament\Resources\ReadableResource\Pages;

use App\Filament\Resources\ReadableResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateReadable extends CreateRecord
{
    protected static string $resource = ReadableResource::class;
}
