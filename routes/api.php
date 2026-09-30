<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EcopontoController;
use App\Http\Controllers\Api\DenunciaController;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Rotas que não precisam do token
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/ecopontos', [EcopontoController::class, 'index']);
Route::get('/ecopontos/{ecoponto}', [EcopontoController::class, 'show']);

// Rotas protegidas ou seja precisam do token para serem acessadas
Route::middleware('auth:sanctum')->group(function () {
    Route::delete('/perfil', [ProfileController::class, 'destroy']);
    Route::post('/perfil', [ProfileController::class, 'update']);
    Route::get('/denuncias', [DenunciaController::class, 'index']);
    Route::post('/denuncias', [DenunciaController::class, 'store']);
    Route::post('/ecopontos', [EcopontoController::class, 'store']);
    Route::put('/ecopontos/{ecoponto}', [EcopontoController::class, 'update']);
    Route::delete('/ecopontos/{ecoponto}', [EcopontoController::class, 'destroy']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

