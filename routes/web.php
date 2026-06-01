<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopDrawingController;
use App\Http\Controllers\UserController;
use App\Models\ShopDrawing;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource(
        'users',
        UserController::class
    );

});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

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
