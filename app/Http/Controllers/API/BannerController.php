<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    use ApiResponse;

    public function index(Request $request)
    {
        $banners = Banner::when($request->game_id, function ($q) use ($request) {
            return $q->where('game_id', $request->game_id);
        })->latest()->get();
        return $this->success($banners, 'Banner List!');
    }
}
