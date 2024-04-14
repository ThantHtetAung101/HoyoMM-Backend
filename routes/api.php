<?php

use App\Http\Controllers\API\BannerController;
use App\Http\Controllers\API\CharacterController;
use App\Http\Controllers\API\ElementController;
use App\Http\Controllers\API\PathController;
use App\Http\Controllers\API\WorldController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/banners', [BannerController::class, 'index']);

Route::resource('worlds', WorldController::class);

Route::resource('characters', CharacterController::class);

Route::resource('elements', ElementController::class);
Route::resource('paths', PathController::class);
