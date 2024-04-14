<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CharacterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'thumbnail' => $this->thumbnail,
            'splash_art' => $this->splash_art,
            'name' => $this->name,
            'type' => $this->type,
            'rarity' => $this->rarity,
            'element' => $this->characterElement->element->thumbnail,
            'path' => $this->characterPath->path->logo,
            'game_id' => $this->game_id,
            'world_id' => $this->world_id,
            'faction_id' => $this->faction_id,
            'description' => $this->description,
            'first_appearance' => $this->first_appearance,
            'content' => json_encode($this->content)
        ];
    }
}
