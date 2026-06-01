<?php

use Illuminate\Support\Facades\Route;
use App\Models\ShopDrawing;
use App\Http\Controllers\ShopDrawingController;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/test-db', function () {
    return ShopDrawing::all();
});

Route::get('/mc0', [ShopDrawingController::class, 'index']);
Route::get('/mc0/create', [ShopDrawingController::class, 'create']);
Route::post('/mc0/store', [ShopDrawingController::class, 'store']);
Route::get('/mc0/{id}', [ShopDrawingController::class, 'show']);
Route::get('/mc0/{id}/edit', [ShopDrawingController::class, 'edit']);
Route::put('/mc0/{id}', [ShopDrawingController::class, 'update']);
Route::delete('/mc0/{id}', [ShopDrawingController::class, 'destroy']);
