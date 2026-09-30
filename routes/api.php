<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rotas públicas
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rotas protegidas (Requer cabeçalho: Authorization: Bearer {token})
Route::middleware('auth:sanctum')->group(function () {
Route::get('/user', [AuthController::class, 'user']);

    Route::post('/logout', [AuthController::class, 'logout']);
});