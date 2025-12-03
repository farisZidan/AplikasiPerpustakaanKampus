<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InfoController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\PerpusController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return redirect('/perpus');
});

// bebas diakses
Route::get('/info', function () {
    return view('info', ['progdi' => 'TI']);
});
Route::get('/info/{kd}', [InfoController::class, 'infoMhs']);

// LOGIN (guest saja yang boleh)
Route::get('/login', [PerpusController::class, 'login'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate'])
    ->middleware('guest');

// LOGOUT (hanya user login)
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth');

// SEMUA ROUTE YANG HARUS LOGIN
Route::middleware('auth')->group(function () {

    Route::get('/perpus', [PerpusController::class, 'index']);

    Route::get('/buku', [BukuController::class, 'index']);
    Route::get('/buku/add', [BukuController::class, 'add_new']);
    Route::post('/buku/save', [BukuController::class, 'save']);
    Route::get('/buku/edit/{id}', [BukuController::class, 'edit']);
    Route::delete('/buku/delete/{id}', [BukuController::class, 'delete']);

    Route::get('/anggota', [AnggotaController::class, 'index']);
    Route::get('/anggota/add', [AnggotaController::class, 'add_new']);
    Route::post('/anggota/save', [AnggotaController::class, 'save']);
    Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit']);
    Route::delete('/anggota/delete/{id}', [AnggotaController::class, 'delete']);

    Route::get('/pinjam', [PinjamController::class, 'index']);
    Route::get('/pinjam/create', [PinjamController::class, 'create']);
    Route::post('/pinjam/save', [PinjamController::class, 'save']);
    Route::get('/pinjam/return/{ID_Pinjam}', [PinjamController::class, 'return_book']);
});
