<?php

namespace App\Filament\Resources\CharacterResource\Pages;

use App\Filament\Resources\CharacterResource;
use App\Models\CharacterElement;
use App\Models\CharacterPath;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditCharacter extends EditRecord
{
    protected static string $resource = CharacterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        //insert the student
        $record->thumbnail = $data['thumbnail'];
        $record->splash_art = $data['splash_art'];
        $record->name = $data['name'];
        $record->description = $data['description'];
        $record->rarity = $data['rarity'];
        $record->type = $data['type'];
        $record->game_id = $data['game_id'];
        $record->world_id = $data['world_id'];
        $record->faction_id = $data['faction_id'];
        $record->first_appearance = $data['first_appearance'];
        $record->content = $data['content'];

        $characterPath = new CharacterPath();
        $characterPath->character_id = $record->id;
        $characterPath->path_id = $data['path_id'];
        $characterPath->save();

        $characterElement = new CharacterElement();
        $characterElement->character_id = $record->id;
        $characterElement->element_id = $data['element_id'];
        $characterElement->save();


        return $record;
    }
}
