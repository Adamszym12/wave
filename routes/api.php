<?php

use App\Http\Controllers\BanController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('banned', BanController::class);
});
