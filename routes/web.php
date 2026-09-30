<?php

use Illuminate\Support\Facades\Route;

// Retorna apenas um status em JSON na raiz do servidor
Route::get('/', function () {
    return response()->json([
        'api' => 'Laravel API',
        'status' => 'online'
    ]);
});