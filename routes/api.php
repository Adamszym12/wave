<?php

use App\Http\Controllers\BanController;
use App\Http\Middleware\CheckSecretKey;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'v1',
    'middleware' => CheckSecretKey::class
], function () {
    Route::apiResource('banned', BanController::class)->only(['index', 'store', 'destroy']);
    Route::apiResource('info', \App\Http\Controllers\PokemonController::class)->only(['index']);
});
