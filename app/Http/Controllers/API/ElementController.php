<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ElementResource;
use App\Models\Element;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ElementController extends Controller
{
    use ApiResponse;
    
    public function index(Request $request)
    {
        $elements = Element::when($request->game_id, function ($q) use ($request) {
            return $q->where('game_id', $request->game_id);
        })->latest()->get();
        return $this->success(ElementResource::collection($elements), 'Character List');
    }
}
