<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\WorldResource;
use App\Models\World;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class WorldController extends Controller
{
    use ApiResponse;

    public function index(Request $request)
    {
        $worlds = World::when($request->game_id, function ($q) use ($request) {
            return $q->where('game_id', $request->game_id);
        })->latest()->get();
        return $this->success(WorldResource::collection($worlds), 'World List');
    }

    public function show(World $world)
    {
        if ($world) {
            return $this->success(new WorldResource($world), 'World Detail');
        } else {
            return $this->error("There're no worlds with this id!", 404);
        }
    }
}
