<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\BookApiController;
use App\Http\Controllers\Api\AuthorApiController;
use App\Http\Controllers\Api\GenreApiController;
use App\Http\Controllers\Api\ReviewApiController;

Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('books', BookApiController::class);
    Route::apiResource('authors', AuthorApiController::class);
    Route::apiResource('genres', GenreApiController::class);
    Route::apiResource('reviews', ReviewApiController::class);
    
    Route::post('/logout', [AuthApiController::class, 'logout']);
});
