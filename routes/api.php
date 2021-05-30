<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

Route::apiResource('/game', GameController::class);
Route::post('/game/game', [GameController::class,'game']);
Route::get('/game/test/{roomId}', [GameController::class,'test']);