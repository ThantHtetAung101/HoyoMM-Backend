<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PathResource;
use App\Models\Path;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class PathController extends Controller
{
    use ApiResponse;

    public function index(Request $request)
    {
        $paths = Path::when($request->game_id, function ($q) use ($request) {
            return $q->where('game_id', $request->game_id);
        })->where('is_playable', 1)->latest()->get();
        return $this->success(PathResource::collection($paths), 'Character List');
    }
}
