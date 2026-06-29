<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\SerahTerimaController;
use App\Http\Controllers\ShopDrawingController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeminjamanDetailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Mc1Controller;

use App\Models\ShopDrawing;
use App\Models\Mc1;
use App\Models\Peminjaman;
use App\Models\Contract;
use App\Models\SerahTerima;
use App\Models\User;

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

    $totalMc0 = ShopDrawing::count();
    $totalMc1 = Mc1::count();
    $totalKontrak = Contract::count();
    $totalSerahTerima = SerahTerima::count();
    $totalPeminjaman = Peminjaman::count();
    $totalUser = User::count();

    return view('dashboard.index', compact(
        'totalMc0',
        'totalMc1',
        'totalKontrak',
        'totalSerahTerima',
        'totalPeminjaman',
        'totalUser'
    ));

})->middleware('auth');

// Route::get('/test-db', function () {
//     return ShopDrawingController::all();
// });

Route::middleware('auth','admin')->group(function () {

    Route::get('/mc0', [ShopDrawingController::class, 'index']);
    Route::get('/mc0/create', [ShopDrawingController::class, 'create']);
    Route::post('/mc0/store', [ShopDrawingController::class, 'store']);
    Route::get('/mc0/{id}', [ShopDrawingController::class, 'show']);
    Route::get('/mc0/{id}/edit', [ShopDrawingController::class, 'edit']);
    Route::put('/mc0/{id}', [ShopDrawingController::class, 'update']);
    Route::delete('/mc0/{id}', [ShopDrawingController::class, 'destroy']);

});


// Route::get('/mc0', [ShopDrawingController::class, 'index']);
// Route::get('/mc0/create', [ShopDrawingController::class, 'create']);
// Route::post('/mc0/store', [ShopDrawingController::class, 'store']);
// Route::get('/mc0/{id}', [ShopDrawingController::class, 'show']);
// Route::get('/mc0/{id}/edit', [ShopDrawingController::class, 'edit']);
// Route::put('/mc0/{id}', [ShopDrawingController::class, 'update']);
// Route::delete('/mc0/{id}', [ShopDrawingController::class, 'destroy']);
Route::middleware(['auth','admin'])->group(function(){
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
});

Route::middleware(['auth','admin'])->group(function(){
Route::resource(
    'serah-terima',
    SerahTerimaController::class
)->except(['show']);

Route::get(
    'serah-terima/{id}/print',
    [SerahTerimaController::class, 'print']
)->name('serah-terima.print');

Route::get(
    'contract/{nomor}',
    [SerahTerimaController::class, 'getContract']
)->name('contract.get');

Route::resource(
    'serah-terima',
    SerahTerimaController::class
);

Route::get(
    '/serah-terima/get-contract/{nomor}',
    [SerahTerimaController::class,'getContract']
)->name('serah-terima.get-contract');

Route::get(
    '/serah-terima/{id}/pdf',
    [SerahTerimaController::class, 'pdf']
)->name('serah-terima.pdf');

});

Route::middleware(['auth','admin'])->group(function () {

    Route::get('/contracts', [ContractController::class, 'index'])
        ->name('contracts.index');

    Route::get('/contracts/export', [ContractController::class, 'export'])
    ->name('contracts.export');

    Route::get('/contracts/create', [ContractController::class, 'create'])
    ->name('contracts.create');

    Route::post('/contracts', [ContractController::class, 'store'])
    ->name('contracts.store');

    Route::get('/contracts/{contract}', [ContractController::class, 'show'])
    ->name('contracts.show');

    Route::get('/contracts/{contract}/edit', [ContractController::class, 'edit'])
    ->name('contracts.edit');

Route::put('/contracts/{contract}', [ContractController::class, 'update'])
    ->name('contracts.update');
    Route::resource('contracts', ContractController::class);

});
Route::get('/contracts/{contract}/download', [ContractController::class, 'download'])
    ->name('contracts.download');


Route::middleware('auth')->group(function () {

    Route::get('/contracts', [ContractController::class, 'index'])
        ->name('contracts.index');

    Route::get('/contracts/{contract}', [ContractController::class, 'show'])
        ->name('contracts.show');

});
