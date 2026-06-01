<?php

use Illuminate\Support\Facades\Route;
use App\Models\ShopDrawing;
use App\Http\Controllers\ShopDrawingController;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/test-db', function () {
    return ShopDrawing::all();
});

Route::get('/mc0', [ShopDrawingController::class, 'index']);
