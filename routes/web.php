<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopDrawingController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeminjamanDetailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Mc1Controller;
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

Route::get('/mc1', [Mc1Controller::class, 'index']);
Route::get('/mc1/create', [Mc1Controller::class, 'create']);
Route::post('/mc1/store', [Mc1Controller::class, 'store']);
Route::get('/mc1/{id}', [Mc1Controller::class, 'show']);
Route::get('/mc1/{id}/edit', [Mc1Controller::class, 'edit']);
Route::put('/mc1/{id}', [Mc1Controller::class, 'update']);
Route::delete('/mc1/{id}', [Mc1Controller::class, 'destroy']);

Route::get('/peminjaman', [PeminjamanController::class, 'index']);
Route::get('/peminjaman/create', [PeminjamanController::class, 'create']);
Route::post('/peminjaman/store', [PeminjamanController::class, 'store']);

Route::get('/peminjaman/{id}', [PeminjamanController::class, 'show']);
Route::get('/peminjaman/{id}/edit', [PeminjamanController::class, 'edit']);
Route::put('/peminjaman/{id}', [PeminjamanController::class, 'update']);
Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy']);

Route::post(
    '/peminjaman-detail/store',
    [PeminjamanDetailController::class, 'store']
);

Route::delete(
    '/peminjaman-detail/{id}',
    [PeminjamanDetailController::class, 'destroy']
);

Route::get(
    '/peminjaman-detail/{id}/edit',
    [PeminjamanDetailController::class, 'edit']
);

Route::put(
    '/peminjaman-detail/{id}',
    [PeminjamanDetailController::class, 'update']
);

Route::get(
    '/peminjaman/{id}/print',
    [PeminjamanController::class, 'print']
);
