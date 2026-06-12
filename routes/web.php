<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\SerahTerimaController;
use App\Http\Controllers\ShopDrawingController;
use App\Http\Controllers\UserController;
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


// Route::get('/test-db', function () {
//     return ShopDrawingController::all();
// });

Route::middleware('auth')->group(function () {

    Route::get('/mc0', [ShopDrawingController::class, 'index']);
    Route::get('/mc0/create', [ShopDrawingController::class, 'create']);
    Route::post('/mc0/store', [ShopDrawingController::class, 'store']);
    Route::get('/mc0/{id}', [ShopDrawingController::class, 'show']);
    Route::get('/mc0/{id}/edit', [ShopDrawingController::class, 'edit']);
    Route::put('/mc0/{id}', [ShopDrawingController::class, 'update']);
    Route::delete('/mc0/{id}', [ShopDrawingController::class, 'destroy']);

});

Route::middleware('auth','admin')
->group(function(){

Route::get(
'/serah-terima',
[SerahTerimaController::class,'index']
);

Route::get(
'/serah-terima/create',
[SerahTerimaController::class,'create']
)->middleware('admin');

Route::post(
'/serah-terima',
[SerahTerimaController::class,'store']
)->middleware('admin');

Route::get(
'/serah-terima/{id}',
[SerahTerimaController::class,'show']
);

Route::delete(
'/serah-terima/{id}',
[SerahTerimaController::class,'destroy']
)->middleware('admin');

Route::get(
'/serah-terima/download/{id}',
[SerahTerimaController::class,'download']
)->middleware('download');

});

Route::get(
    '/serah-terima/{id}/print',
    [SerahTerimaController::class,'print']
)->middleware('admin');

Route::get(
'/serah-terima/{id}/edit',
[SerahTerimaController::class,'edit']
)->middleware('admin');

Route::put(
'/serah-terima/{id}',
[SerahTerimaController::class,'update']
)->middleware('admin');

Route::get(
    '/serah-terima/{id}/pdf',
    [SerahTerimaController::class,'pdf']
);

Route::get(
    '/serah-terima/{id}/download-pdf',
    [SerahTerimaController::class,'downloadPdf']
);

Route::middleware('auth')->group(function(){

Route::get('/contracts/export', [ContractController::class, 'export'])
    ->name('contracts.export');

    Route::get(
        '/contracts',
        [ContractController::class,'index']
    );

    Route::get(
        '/contracts/create',
        [ContractController::class,'create']
    )->middleware('admin');

    Route::resource('contracts', ContractController::class);
    Route::post(
        '/contracts',
        [ContractController::class,'store']
    )->middleware('admin');

    Route::get(
        '/contracts/{id}/edit',
        [ContractController::class,'edit']
    )->middleware('admin');

    Route::put(
        '/contracts/{id}',
        [ContractController::class,'update']
    )->middleware('admin');

    Route::delete(
        '/contracts/{id}',
        [ContractController::class,'destroy']
    )->middleware('admin');

    Route::get(
        '/contracts/download/{id}',
        [ContractController::class,'download']
    )->middleware('download');

});

Route::middleware('auth')->group(function(){

    // Route::get(
    //     '/contracts/export',
    //     [ContractController::class, 'export']
    // )->name('contracts.export');

    Route::get(
        '/contracts/download/{id}',
        [ContractController::class, 'download']
    )->name('contracts.download');

    Route::resource(
        'contracts',
        ContractController::class
    );

});
