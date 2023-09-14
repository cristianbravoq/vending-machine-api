<?php


use Illuminate\Http\Request;
use Barryvdh\Cors\HandleCors;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;
use App\Http\Controllers\CoinController;

Route::get('/items', [ItemController::class, 'getAll']);
Route::get('/items/{itemId}', [ItemController::class, 'getById']);
Route::put('/items/{itemId}', [ItemController::class, 'updateById']);

Route::get('/coins', [CoinController::class, 'getAll']);
Route::get('/coins/return', [CoinController::class, 'returnCoinsInsertByUser']);
Route::put('/coins/{coinId}', [CoinController::class, 'updateById']);
Route::get('/coins/inserted', [CoinController::class, 'getInfoCoinsInserted']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware([HandleCors::class])->group(function () {
    // Define tus rutas aquí
});