<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

Route::apiResource('/game', GameController::class);