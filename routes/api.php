<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostApiController;
use Illuminate\Auth\Events\Login;
use App\Http\Controllers\api\AuthController;


Route::prefix('v1')->group(function () {
    Route::apiResource('post', PostApiController::class);

    Route::prefix('auth')->group(function() { 
        Route::post('login', [AuthController::class, 'Login'] );

        //only me
        Route::middleware('auth:api')->group(function () {
            Route::get('me', [AuthController::class, 'me'] );
            Route::post('logout', [AuthController::class, 'Logout'] );
            Route::post('refresh', [AuthController::class, 'refresh'] );
        });
    });
});
