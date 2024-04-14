<?php

namespace App\Filament\Resources\CharacterResource\Pages;

use App\Filament\Resources\CharacterResource;
use App\Models\CharacterElement;
use App\Models\CharacterPath;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateCharacter extends CreateRecord
{
    protected static string $resource = CharacterResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        //insert the student
        $record =  static::getModel()::create([
            'thumbnail' => $data['thumbnail'],
            'splash_art' => $data['splash_art'],
            'name' => $data['name'],
            'description' => $data['description'],
            'rarity' => $data['rarity'],
            'type' => $data['type'],
            'game_id' => $data['game_id'],
            'world_id' => $data['world_id'],
            'faction_id' => $data['faction_id'],
            'first_appearance' => $data['first_appearance'],
            'content' => $data['content'],
        ]);

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
