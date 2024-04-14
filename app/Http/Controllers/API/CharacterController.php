<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CharacterResource;
use App\Models\Character;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    use ApiResponse;

    public function index(Request $request)
    {
        $characters = Character::when($request->game_id, function ($q) use ($request) {
            return $q->where('game_id', $request->game_id);
        })->when($request->elements && $request->elements != '[]', function ($q) use ($request) {
            return $q->whereIn('character_elements.element_id', json_decode($request->elements));
        })->when($request->paths && $request->paths != '[]', function ($q) use ($request) {
            return $q->whereIn('character_paths.path_id', json_decode($request->paths));
        })
        ->join('character_elements', 'character_elements.character_id', 'characters.id')
        ->join('character_paths', 'character_paths.character_id', 'characters.id')
        ->orderBy('characters.created_at')->get();
        return $this->success(CharacterResource::collection($characters), 'Character List');
    }

    public function show(Character $character)
    {
        if ($character) {
            return $this->success(new CharacterResource($character), 'Character Detail');
        } else {
            return $this->error("There're no characters with this id!", 404);
        }
    }
}
