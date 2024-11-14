<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);

    Route::resource('/products', ProductController::class); // to be changed lattter Route::apiResource('', ProductController::class);
});

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);